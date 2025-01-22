import { Link } from "react-router-dom";
import { useTranslation } from 'react-i18next';
import LanguageSwitcher from '../../lang/LanguageSwitcher';

function Header() {

    const { t } = useTranslation();

    return (
        <header>
            <nav className="bg-black border-gray-200 px-4 lg:px-6 py-2.5 ">
                <div className="flex flex-wrap justify-between items-center mx-auto">
                    <Link to="/" className="flex items-center">
                        <span className="self-center text-xl font-semibold whitespace-nowrap text-white">LOGO</span>
                    </Link>
                    <div className="flex items-center lg:order-2 gap-2">
                        <LanguageSwitcher />
                    </div>
                    <div className="justify-between items-center w-full flex lg:w-auto" id="large-screen-menu">
                        <ul className="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <Link to="/"
                                    className="block py-2 pr-4 pl-3 border-b lg:border-0 lg:hover:text-primary-700 lg:p-0 text-gray-400 
                                lg:hover:text-white hover:bg-gray-700 hover:text-white lg:hover:bg-transparent
                                 border-gray-700">
                                    {t("Header.Home")}
                                </Link>
                            </li>
                            <li>
                                <Link to="/products"
                                    className="block py-2 pr-4 pl-3 border-b lg:border-0 lg:hover:text-primary-700 lg:p-0 
                                text-gray-400 lg:hover:text-white hover:bg-gray-700 hover:text-white lg:hover:bg-transparent
                                 border-gray-700">
                                    {t("Header.Products")}
                                </Link>
                            </li>
                            <li>
                                <Link to="/contact" className="block py-2 pr-4 pl-3 border-b lg:border-0 lg:hover:text-primary-700 lg:p-0 text-gray-400 lg:hover:text-white hover:bg-gray-700 hover:text-white lg:hover:bg-transparent border-gray-700">
                                    {t("Header.Contact")}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


        </header>
    )
}

export default Header