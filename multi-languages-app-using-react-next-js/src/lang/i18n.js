import i18n from 'i18next';
import { initReactI18next } from 'react-i18next';
import i18nextHttpBackend from 'i18next-http-backend';

i18n
    .use(i18nextHttpBackend)
    .use(initReactI18next)
    .init({
        lng: localStorage.getItem('i18nextLng') || 'en', // Get saved language from localStorage or default to 'en'
        fallbackLng: 'en',
        backend: {
            // رابط ملفات اللغة
            loadPath: '/locales/{{lng}}.json',
        },
        interpolation: {
            escapeValue: false // react already safes from xss => https://www.i18next.com/translation-function/interpolation#unescape
        }
    });