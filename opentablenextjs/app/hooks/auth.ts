import useSWR from 'swr'
import {useRouter, useSearchParams} from 'next/navigation'
import Axios from '../../lib/axios'
import React, {Dispatch, SetStateAction, useCallback, useContext, useEffect} from 'react'
import {AxiosError} from "axios";
import AuthContext, {AuthenticationContext} from "../context/AuthContext";
import {Simulate} from "react-dom/test-utils";

export interface RegisterProps {
    firstName: string,
    lastName: string,
    email: string,
    phone:string,
    city:string,
    password: string,
    password_confirmation: string,
    setErrors: Dispatch<SetStateAction<string[]>>
}

export interface LoginProps {
    email: string
    password: string
    remember:boolean
    setErrors: Dispatch<SetStateAction<string[]>>
    setStatus: Dispatch<SetStateAction<string | null>>
}

export interface ForgotPasswordProps {
    email: string
    setErrors: Dispatch<SetStateAction<string[]>>
    setStatus: Dispatch<SetStateAction<string | null>>
}

export interface ResetPasswordProps {
    email: string | string[]
    password: string
    password_confirmation: string
    setErrors: Dispatch<SetStateAction<string[]>>
    setStatus: Dispatch<SetStateAction<string | null>>
}

export interface AuthParam {
    middleware?: 'guest' | 'auth'
    redirectIfAuthenticated?: string
}
export interface User {
    id?: string
    firstName?: string
    lastName?: string
    email?: string
    city?: string
    email_verified_at?: string
    created_at?: string
    updated_at?: string
}

export function useAuth(param?: AuthParam) {
    const { middleware, redirectIfAuthenticated } = param || {}
    const router = useRouter()
    const searchParams = useSearchParams()
    const {loading, data, errorBag, setAuthState } = useContext(AuthenticationContext)

    // const {
    //     data: user,
    //     error,
    //     mutate,
    //     isLoading,
    // } = useSWR<User>('/api/user', () =>
    //     Axios
    //         .get('/api/user')
    //         .then((res) => res.data)
    //         .catch((error) => {
    //             if (error.response.status !== 409) throw error
    //             router.push('/verify-email')
    //         })
    // )

    // const intercept = Axios.interceptors.request.use(async function (request) {
    //     // Do something before request is sent
    //
    //     createLaravelCSRFHeader(await getCSRFToken())
    // }, function (error) {
    //     // Do something with request error
    //     return Promise.reject(error);
    // })

    //#region Helpers
    /**
     * Get required csrf values from Laravel Sanctum header
     * @param csrfSetCookies
     * @returns
     */


    const getLaravelSanctumCookies = (csrfSetCookies: string[]) => {
        let cookies = csrfSetCookies[0].split(';')[0] + '; ';
        cookies += csrfSetCookies[1].split(';')[0] + '; ';
        return cookies;
    }

    /**
     * Get XSRF Token Value from Laravel Sanctum header value
     * @param csrfSetCookies
     * @returns
     */
    const getXSRFVal = (csrfSetCookies: string[]) => {
        return decodeURIComponent(csrfSetCookies[0].split(';')[0].replace('XSRF-TOKEN=',''));
    }
    const getCSRFToken = () => {
        return Axios.get('/sanctum/csrf-cookie')
            .then(res => {
                return res.headers['set-cookie'] ?? [];
            })
            .catch((err: AxiosError) => {
                throw err;
            });
    }

    /**
     * Creates the header required for csrf and laravel sanctum to work properly
     * @param setCookiesCSRFToken
     * @returns
     */
    const createLaravelCSRFHeader = (setCookiesCSRFToken: string[]) => {
        return {
            Cookie: getLaravelSanctumCookies(setCookiesCSRFToken),
            "X-XSRF-TOKEN": getXSRFVal(setCookiesCSRFToken)
        };
    }
    const csrf = () => Axios.get('/sanctum/csrf-cookie')
        .then(res => res)
        .catch((err: AxiosError) => {
            throw err;
        });

    const register = async ({setErrors, ...registerProps }: RegisterProps) => {


        setErrors([])
        setAuthState({
            data:null,
            loading:true,
            errorBag:null
        })
        await csrf()

        Axios
            .post('/register', registerProps)
            .then((response)=>{
                setAuthState({
                    data:response.data,
                    loading:false,
                    errorBag:null
                })
            // mutate()
            })
            .catch((error) => {
                setAuthState({
                    data:null,
                    loading:false,
                    errorBag:error.response.data
                })
                if (error.response.status !== 422) throw error
                const errors = []
                for (const key in error.response.data.errors) {
                    errors.push(error.response.data.errors[key])
                }
                setErrors(errors)
            })
    }

    const login = async ({ setErrors, setStatus, ...props }: LoginProps) => {

        setErrors([])
        setStatus(null)
        await csrf()

        Axios
            .post('/login', props)
            .then((response) => {
                setAuthState({
                    data:response.data,
                    loading:false,
                    errorBag:null
                })
                // mutate()
            })
            .catch((error) => {
                setAuthState({
                    data:null,
                    loading:false,
                    errorBag:error.response.data
                })
                if (error.response.status !== 422) throw error
                const errors = []
                for (const key in error.response.data.errors) {
                    errors.push(error.response.data.errors[key])
                }
                setErrors(errors)
            })

    }

    const forgotPassword = async ({
                                      setErrors,
                                      setStatus,
                                      email,
                                  }: ForgotPasswordProps) => {
        await csrf()

        setErrors([])
        setStatus(null)

        Axios
            .post('/forgot-password', { email })
            .then((response) => setStatus(response.data.status))
            .catch((error) => {
                if (error.response.status !== 422) throw error

                const errors = []
                for (const key in error.response.data.errors) {
                    errors.push(error.response.data.errors[key])
                }
                setErrors(errors)
            })
    }

    const resetPassword = async ({
                                     setErrors,
                                     setStatus,
                                     ...props
                                 }: ResetPasswordProps) => {

        // @ts-ignore
        const token : string|null = searchParams.get('token')
        await csrf()

        setErrors([])
        setStatus(null)

        Axios
            .post('/reset-password', { token: token, ...props })
            .then((response) =>
                router.push('/login?reset=' + btoa(response.data.status))
            )
            .catch((error) => {
                if (error.response.status !== 422) throw error

                const errors = []
                for (const key in error.response.data.errors) {
                    errors.push(error.response.data.errors[key])
                }
                setErrors(errors)
            })
    }

    const resendEmailVerification = (
        setStatus: React.Dispatch<React.SetStateAction<string | null>>
    ) => {
        Axios
            .post('/email/verification-notification')
            .then((response) => setStatus(response.data.status))
    }

    // const logout = useCallback(async () => {
    //     if (!error) {
    //         await Axios.post('/logout').then(() => mutate())
    //     }
    //
    //     window.location.pathname = '/login'
    // }, [error, mutate])
    //
    // useEffect(() => {
    //     if (middleware === 'guest' && redirectIfAuthenticated && user)
    //         router.push(redirectIfAuthenticated)
    //     if (middleware === 'auth' && error) logout()
    // }, [middleware, redirectIfAuthenticated, logout, router, user, error])

    return {
        // user,
        register,
        login,
        forgotPassword,
        resetPassword,
        resendEmailVerification,
        // logout,
    }
}