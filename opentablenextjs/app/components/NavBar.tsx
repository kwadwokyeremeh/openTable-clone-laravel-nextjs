import Logo from "./Logo";
import LoginModal from "./auth/LoginModal";
import SignUpModal from "./auth/SignupModal";

export default function NavBar(){
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
                    <LoginModal/>
                    <SignUpModal/>
                </div>
            </div>
        </nav>
    )
}