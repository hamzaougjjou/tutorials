import React from 'react'
import { useTranslation } from 'react-i18next'

function Hero() {
    const { t } = useTranslation();
    return (
        <section className="min-h-[calc(100vh-60px)] mx-auto
        flex flex-col justify-center items-center text-center max-w-7xl
        ">
            <h1 className="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl text-white -mt-52">
                {t("Hero.Title")}
            </h1>
            <p className="mt-8 text-lg font-normal lg:text-xl sm:px-16 xl:px-48 text-gray-400">
                {t("Hero.SubTitle")}
            </p>

            <p className="inline-flex justify-center items-center py-3 px-8 text-base font-medium text-center
             rounded-lg border focus:ring-4 gap-4 mt-20 cursor-pointer
             text-white border-gray-700 hover:bg-gray-700 focus:ring-gray-800">
                {t("Hero.Button")}
            </p>

        </section>
    )
}

export default Hero