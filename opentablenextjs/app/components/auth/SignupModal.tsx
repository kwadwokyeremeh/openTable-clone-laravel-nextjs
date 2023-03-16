"use client"
import Modal from "../Modal";
import React, {useEffect, useRef, useState, useTransition} from "react";
import * as yup from 'yup';
import {InferType} from "yup";
import {useRouter} from "next/navigation";
import axios from "../../../lib/axios";
import {useAuth, RegisterProps} from "../../hooks/auth";





// parse and assert validity


// type User = InferType<typeof userSchema>;

/* {
  name: string;
  age: number;
  email?: string | undefined
  website?: string | null | undefined
  createdOn: Date
}*/

export default function SignUpModal(){
    const { register } = useAuth({
        middleware: 'guest',
        redirectIfAuthenticated: '/',
    })
    const myRef = useRef(null);
    const router = useRouter();
    const [isPending, startTransition] = useTransition();
    const [isFetching, setIsFetching] = useState(false);
    const [isDisabled, setIsDisabled] = useState(true)
    const [formData, setFormData] = useState<RegisterProps>({
        setErrors(value: ((prevState: string[]) => string[]) | string[]): void {
        },
        firstName: '',
        lastName: '',
        email:'',
        city:'',
        password:'',
        phone:''
    })
    const [errors, setErrors] = useState<string[]>([])
    const isMutating = isFetching || isPending;

    useEffect(()=>{
        const isNotEmpty = (element:string) => element === '';
        setIsDisabled(Object.values(formData).some(isNotEmpty))
    })

    let userSchema = yup.object({
        firstName: yup.string().required(),
        lastName: yup.string().required(),
        city: yup.string().required(),
        email: yup.string().email().required(),
        password: yup.string().required().min(6),
        phone: yup.string().required(),
})


    const handleChange = (e:React.ChangeEvent<HTMLInputElement>)=>{
        setFormData({
            ...formData,
            [e.target.name]: e.target.value
        })
    }

    const handleSubmit = async (event: { preventDefault: () => void; })=>{
        event.preventDefault()
        // await userSchema.validate(formData)

        setIsFetching(true);
        console.log(formData)
        await register(formData)
        setIsFetching(false);

        startTransition(() => {
            // Refresh the current route and fetch new data from the server without
            // losing client-side browser or React state.
            router.refresh();
        });
        // const user = await userSchema.validate(await signup());
        // console.log(user)
        // @ts-ignore
        myRef.current?.closeModal();

    }
    const handleErrors = (e: React.SyntheticEvent<HTMLInputElement, Event>) =>{
        
    }
    const form = ()=>{
        return (
            <form onSubmit={handleSubmit}>

                <div className="mb-6">
                    <input
                        type="text"
                        placeholder="First Name"
                        required
                        className="border-[#E9EDF4] w-[49%] rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                        value={formData.firstName}
                        onChange={handleChange}
                        name='firstName'
                        onError={handleErrors}
                    />
                    <input
                        type="text"
                        placeholder="Last Name"
                        required
                        className="border-[#E9EDF4] w-[49%] ml-2 rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                        value={formData.lastName}
                        onChange={handleChange}
                        name='lastName'
                    />
                </div>

                <div className="mb-6">
                    <input
                        type="text"
                        placeholder="City"
                        required
                        className="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                        value={formData.city}
                        onChange={handleChange}
                        name='city'
                    />
                </div>
                <div className="mb-6">
                    <input
                        type="text"
                        placeholder="Email"
                        required
                        className="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                        value={formData.email}
                        onChange={handleChange}
                        name='email'
                    />
                </div>
                <div className="mb-6">
                    <input
                        type="text"
                        placeholder="Phone"
                        required
                        className="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                        value={formData.phone}
                        onChange={handleChange}
                        name='phone'
                    />
                </div>
                <div className="mb-6">
                    <input
                        type="password"
                        placeholder="Password"
                        required
                        className="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                        value={formData.password}
                        onChange={handleChange}
                        name='password'
                    />
                </div>
                <button
                    type="submit"
                    className="w-full text-white uppercase bg-red-600 justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium  hover:bg-red-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2 disabled:bg-gray-400"
                    disabled={isDisabled}
                    // onClick={handleOnClick}
                >
                    Create Account
                </button>
            </form>
        )
    }
    return (
        <Modal title={"Create an Account"} formData={form()} ref={myRef}/>
    )
}