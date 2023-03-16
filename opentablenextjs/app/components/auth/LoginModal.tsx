"use client"
import Modal from "../Modal";
import React, {useRef, useState} from "react";

export default function LoginModal(){
    const myRef = useRef(null);
    const [formData, setFormData] = useState({
        email:'',
        password:''
    })

    const handleOnClick = ()=>{
        // @ts-ignore
        myRef.current?.closeModal();
    }

    const handleChange = (e:React.ChangeEvent<HTMLInputElement>)=>{
        setFormData({
            ...formData,
            [e.target.name]: e.target.value
        })
    }
    const form = ()=>{
        return (
            <>
                <div className="mb-6">
                    <input
                        type="text"
                        placeholder="Email"
                        className="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                        value={formData.email}
                        onChange={handleChange}
                        name='email'
                    />
                </div>
                <div className="mb-6">
                    <input
                        type="password"
                        placeholder="Password"
                        className="border-[#E9EDF4] w-full rounded-md border bg-[#FCFDFE] py-3 px-5 text-base text-body-color placeholder-[#ACB6BE] outline-none focus:border-primary focus-visible:shadow-none"
                        value={formData.password}
                        onChange={handleChange}
                        name='password'
                    />
                </div>
                <button
                    type="submit"
                    className="w-full text-white uppercase bg-red-600 justify-center rounded-md border border-transparent px-4 py-2 text-sm font-medium hover:bg-red-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2 disabled:bg-gray-400"
                    onClick={handleOnClick}
                >
                    Sign In
                </button>
            </>
        )
    }
    return (
        <Modal title={"Sign In"} formData={form()} ref={myRef}/>
    )
}