"use client"
import { Dialog, Transition } from '@headlessui/react'
import React, {Fragment, useImperativeHandle, useRef, useState} from 'react'

export interface ModalType{
    title:string
    formData:any

}

const Modal = React.forwardRef((content:ModalType, ref) => {
    let [isOpen, setIsOpen] = useState(false)
    const modalRef = useRef(null)

    const closeModal= () => {
        setIsOpen(false)
    }
    const openModal= () => {
        setIsOpen(true)
    }

    useImperativeHandle(ref, () => {
        return {
            closeModal() {
                setIsOpen(false)
            },

            openModal() {
                setIsOpen(true)
            }
        };
    }, []);

    const handleOpenModal = ()=>{
        // @ts-ignore
        modalRef.current?.openModal();
    }
    const handleCloseModal = ()=>{
        // @ts-ignore
        modalRef.current?.closeModal();
    }

    const classAdd = ():string => {
        if(content.title==="Sign In"){
           return ("bg-red-800  text-white border p-1 px-4 rounded mr-3 items-center justify-center rounded-md bg-opacity-90 text-md font-medium hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-red focus-visible:ring-opacity-75")

        }
        else
        {
            return (" text-black border p-1 px-4 rounded mr-3 items-center justify-center rounded-md bg-opacity-70 text-md font-medium hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-red focus-visible:ring-opacity-75")
        }
    }

    return (
        <>
            <button
                type="button"
                onClick={openModal}
                className={classAdd()}
            >
                {content.title}
            </button>

            <Transition appear show={isOpen} as={Fragment}>
                <Dialog as="div" className="relative z-10" onClose={closeModal}>
                    <Transition.Child
                        as={Fragment}
                        enter="ease-out duration-300"
                        enterFrom="opacity-0"
                        enterTo="opacity-100"
                        leave="ease-in duration-200"
                        leaveFrom="opacity-100"
                        leaveTo="opacity-0"
                    >
                        <div className="fixed inset-0 bg-black bg-opacity-25" />
                    </Transition.Child>

                    <div className="fixed inset-0 overflow-y-auto">
                        <div className="flex min-h-full items-center justify-center p-4 text-center">
                            <Transition.Child
                                as={Fragment}
                                enter="ease-out duration-300"
                                enterFrom="opacity-0 scale-95"
                                enterTo="opacity-100 scale-100"
                                leave="ease-in duration-200"
                                leaveFrom="opacity-100 scale-100"
                                leaveTo="opacity-0 scale-95"
                            >
                                <Dialog.Panel className="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all">
                                    <Dialog.Title
                                        as="h3"
                                        className="text-lg font-medium leading-6 text-gray-900"
                                    >
                                        {content.title}
                                    </Dialog.Title>
                                    <div className="mt-2">
                                        {content.formData}
                                    </div>

                                    <div className="mt-4">

                                    </div>
                                </Dialog.Panel>
                            </Transition.Child>
                        </div>
                    </div>
                </Dialog>
            </Transition>
        </>
    )
})

export default Modal