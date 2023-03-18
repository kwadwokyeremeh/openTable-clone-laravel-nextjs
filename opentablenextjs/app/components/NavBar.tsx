"use client"
import Logo from "./Logo";
import LoginModal from "./auth/LoginModal";
import SignUpModal from "./auth/SignupModal";
import {useAuth} from "../hooks/auth";
import {useContext} from "react";
import {AuthenticationContext} from "../context/AuthContext";

export default function NavBar(){
const {data} = useContext(AuthenticationContext)
    return (
        <nav className="bg-white p-2 flex justify-between">
            <Logo/>
            <div>
                <div className="flex">
                    {/*<button*/}
                    {/*    className="bg-blue-400 text-white border p-1 px-4 rounded mr-3"*/}
                    {/*>*/}
                    {/*    Sign in*/}
                    {/*</button>*/}
                    {
                        data?
                            (<div className="text-black justify-center">
                                {data?.firstName}
                            </div>)
                            :
                            (<>
                                <LoginModal/>
                                <SignUpModal/>
                            </>
                            )
                    }

                </div>
            </div>
        </nav>
    )
}