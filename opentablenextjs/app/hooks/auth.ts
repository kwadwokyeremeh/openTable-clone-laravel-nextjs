import useSWR from 'swr'
import {useRouter, useSearchParams} from 'next/navigation'
import Axios from '../../lib/axios'
import React, { Dispatch, SetStateAction, useCallback, useEffect } from 'react'

export interface RegisterProps {
    firstName: string,
    lastName: string,
    email: string,
    phone:string,
    city:string,
    password: string,
    // password_confirmation: string,
    setErrors: Dispatch<SetStateAction<string[]>>
}

export interface LoginProps {
    email: string
    password: string
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
    id?: number
    name?: string
    email?: string
    email_verified_at?: string
    created_at?: string
    updated_at?: string
}

export function useAuth(param?: AuthParam) {
    const { middleware, redirectIfAuthenticated } = param || {}
    const router = useRouter()
    const searchParams = useSearchParams()

    const {
        data: user,
        error,
        mutate,
    } = useSWR<User>('/api/user', () =>
        Axios
            .get('/api/user')
            .then((res) => res.data)
            .catch((error) => {
                if (error.response.status !== 409) throw error
                router.push('/verify-email')
            })
    )

    const csrf = () => Axios.get('/sanctum/csrf-cookie')

    const register = async ({setErrors, ...registerProps }: RegisterProps) => {
        await csrf()

        setErrors([])

        Axios
            .post('/register', registerProps)
            .then(()=>mutate())
            .catch((error) => {
                if (error.response.status !== 422) throw error
                const errors = []
                for (const key in error.response.data.errors) {
                    errors.push(error.response.data.errors[key])
                }
                setErrors(errors)
            })
    }

    const login = async ({ setErrors, setStatus, ...props }: LoginProps) => {
        await csrf()

        setErrors([])
        setStatus(null)

        Axios
            .post('/login', props)
            .then(() => mutate())
            .catch((error) => {
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

    const logout = useCallback(async () => {
        if (!error) {
            await Axios.post('/logout').then(() => mutate())
        }

        window.location.pathname = '/login'
    }, [error, mutate])

    useEffect(() => {
        if (middleware === 'guest' && redirectIfAuthenticated && user)
            router.push(redirectIfAuthenticated)
        if (middleware === 'auth' && error) logout()
    }, [middleware, redirectIfAuthenticated, logout, router, user, error])

    return {
        user,
        register,
        login,
        forgotPassword,
        resetPassword,
        resendEmailVerification,
        logout,
    }
}