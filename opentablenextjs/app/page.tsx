import Header from "./components/Header";
import Cards from "./components/Cards";
import { Inter } from 'next/font/google';
import React from "react";

const inter = Inter({ subsets: ['latin'] })


export default function Home() {
    return (
          <>
            <Header/>
              <Cards />

          </>
  )
}
