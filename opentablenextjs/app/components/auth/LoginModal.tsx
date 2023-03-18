"use client"
import Modal from "../Modal";
import React, {useContext, useEffect, useRef, useState, useTransition} from "react";
import {LoginProps, useAuth} from "../../hooks/auth";
import {useRouter} from "next/navigation";
import {AuthenticationContext} from "../../context/AuthContext";
import {SpinnerRoundOutlined} from "spinners-react";

export default function LoginModal(){
    const { login } = useAuth({
        middleware: 'guest',
        redirectIfAuthenticated: '/',
    })
    const myRef = useRef(null);
    const router = useRouter()
    const [isPending, startTransition] = useTransition();
    const [disabled, setDisabled] = useState(true)
    const [isFetching, setIsFetching] = useState(false)
    const [errors, setErrors] = useState<{setErrors:LoginProps}>()
    const [status, setStatus] = useState<{setStatus:LoginProps}>()
    const { loading, data, errorBag } = useContext(AuthenticationContext)
    const isMutating = isFetching || isPending || loading;

    const [loginData, setLoginData] = useState<LoginProps>({
        setErrors(value: ((prevState: string[]) => string[]) | string[]): void {},
        // @ts-ignore
        setStatus(value: ((prevState: (string | null)) => (string | null)) | string): void {},
        email:'',
        password:'',
        remember: true,
    })

    useEffect(()=>{
        const isFieldEmpty = (element:string) => element === '';
        setDisabled(Object.values(loginData).some(isFieldEmpty))
    })

    const handleOnSubmit = async (event: { preventDefault: () => void; })=>{
        event.preventDefault()
        // await userSchema.validate(loginData)

        setIsFetching(true);
        // console.log(loginData)

        await login(loginData);

        setIsFetching(false);

        startTransition(() => {
            // Refresh the current route and fetch new data from the server without
            // losing client-side browser or React state.
            router.refresh();
        });

        // if (data){
        //     // @ts-ignore
        //     myRef.current?.closeModal();
        // }

    }

    const handleChange = (e:React.ChangeEvent<HTMLInputElement>)=>{
        setLoginData({
            ...loginData,
            [e.target.name]: e.target.value
        })
    }
    const form = ()=>{
        return (
            <>
                {isMutating ?
                    <div className="flex justify-center">
                        <SpinnerRoundOutlined size={90} thickness={100} speed={100} color="rgba(172, 57, 59, 1)" />
                </div>
                :
                    <form>
                            <div className="mb-6">
                                <input
                                    type="text"
                                    placeholder="Email"
                                    className="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                                    value={loginData.email}
                                    onChange={handleChange}
                                    name='email'/>
                                {errors?<div className="text-red-500">These credentials does not match our data</div>:''}
                            </div>
                            <div className="mb-6">
                                <input
                                    type="password"
                                    placeholder="Password"
                                    className="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                                    value={loginData.password}
                                    onChange={handleChange}
                                    name='password'/>
                                {errors?<div className="text-red-500">{errors.setErrors.password}</div>:''}
                            </div>
                            <button
                                type="submit"
                                className="w-full text-white uppercase bg-red-600 justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium hover:bg-red-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2 disabled:bg-gray-400"
                                onClick={handleOnSubmit}
                                disabled={disabled}
                            >
                                Sign In
                            </button>
                        </form>
                }
            </>
        )
    }
    return (
        <Modal title={"Sign In"} formData={form()} ref={myRef}/>
    )
}