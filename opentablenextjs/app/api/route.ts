import { NextResponse } from 'next/server'
import {ResponseCookie} from "next/dist/compiled/@edge-runtime/cookies";


export async function POST({formData}:any) {
    const csrf = await fetch('http://127.0.0.1:8000/sanctum/csrf-cookie',{
        credentials: "include",
        // cache: "no-cache",
        headers: {
            method: 'GET',
            "Content-Type": "application/json",
            accept: 'application/json',
            referer: 'http://localhost:3000/',
            'X-Requested-With': 'XMLHttpRequest',
        }})
    const data = await csrf.json();

    const csrfCookie = NextResponse.json({ data })

    const newHeaders = new Headers(csrfCookie.headers);

    let token : ResponseCookie | undefined  = csrfCookie.cookies.get("XSRF-TOKEN")
    // @ts-ignore
    newHeaders.set('X-XSRF-TOKEN', token);
    newHeaders.set("Content-Type", "application/json");

    // Mutate external data source

    const signup  = await fetch('http://127.0.0.1:8000/register',{
            credentials: "include",
            // cache: "no-cache",
            // @ts-ignore
            headers: newHeaders,
            method: "POST",
            body:JSON.stringify(formData)
        }
    ).then(res=>res.json())

    // axios
    //     .get("http://localhost:8000/sanctum/csrf-cookie", {
    //         withCredentials: true,
    //     })
    //     .then((response) => {
    //         axios("http://localhost:8000/api/app/user/login", {
    //             method: "post",
    //             data: data,
    //             withCredentials: true,
    //         })
    //             .then((response) => {
    //                 console.log("login", response.data);
    //             })
    //             .catch((error) => {
    //                 console.log(error);
    //             });
    //     })
    //     .catch((error) => {
    //         // handle error
    //         console.log(error);
    //     })
    //     .then(() => {
    //         //
    //     });
}