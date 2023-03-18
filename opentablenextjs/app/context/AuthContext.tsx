"use client"
import React, {createContext, useState} from "react";
import {User} from "../hooks/auth";

interface AuthStateType {
    loading:boolean
    data:User|null
    errorBag: string|null
}

interface AuthState extends AuthStateType {
    setAuthState: React.Dispatch<React.SetStateAction<AuthStateType>>
}
export const AuthenticationContext = createContext<AuthState>({
    loading:false,
    data:null,
    errorBag:null,
    setAuthState: () => {}
})
export default function AuthContext({children,}:{children:React.ReactNode}){
const [authState, setAuthState] = useState<AuthStateType>({
    loading: false,
    data: null,
    errorBag:null
})
    return(
        <AuthenticationContext.Provider value={{
            ...authState,
            setAuthState}}>
            {children}
        </AuthenticationContext.Provider>
    )

}