import React, { useState } from 'react';
import { ChevronDown, Globe } from 'lucide-react'; // أيقونات من مكتبة lucide-react
import { useTranslation } from 'react-i18next';
import { languages} from "./Vars";

const LanguageSwitcher = () => {
  const [isOpen, setIsOpen] = useState(false); // حالة التحكم بفتح وإغلاق القائمة المنسدلة

  // الحصول على اللغة المحفوظة في localStorage أو اللغة الافتراضية (الإنجليزية)
  const [selectedLang, setSelectedLang] = useState(
    localStorage.getItem('i18nextLng') || 'en'
  );

  const { i18n } = useTranslation(); // استخدام i18n لتغيير اللغة

  // دالة لتبديل اللغة
  const switchLanguage = (lang) => {
    i18n.changeLanguage(lang); // تغيير اللغة باستخدام i18n
    localStorage.setItem('i18nextLng', lang); // حفظ اللغة الجديدة في localStorage
    setIsOpen(false); // إغلاق القائمة المنسدلة بعد اختيار اللغة
    setSelectedLang(lang); // تحديث اللغة المحددة
  };

  return (
    <div className="relative inline-block text-left">
      {/* زر التحكم بالقائمة المنسدلة */}
      <button
        onClick={() => setIsOpen(!isOpen)} // عكس حالة فتح القائمة عند الضغط على الزر
        className="flex items-center justify-between gap-2 px-4 py-2 bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 w-[150px] focus:outline-none"
      >
        <Globe className="w-5 h-5 text-gray-600 " /> {/* أيقونة الكرة الأرضية */}
        <span className="capitalize">
          {
            languages.find(lang => lang.code === selectedLang)?.label
          } {/* عرض اسم اللغة المحددة */}
        </span>
        <ChevronDown className="w-4 h-4 text-gray-600" /> {/* أيقونة السهم لأسفل */}
      </button>

      {/* القائمة المنسدلة لعرض اللغات */}
      {isOpen && (
        <div className="absolute z-50 right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-200">
          <ul className="py-2">
            {languages.map((lang) => (
              <li
                key={lang.code} // مفتاح فريد لكل عنصر في القائمة
                onClick={() => switchLanguage(lang.code)} // استدعاء الدالة لتبديل اللغة عند الضغط
                className={`px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 ${selectedLang === lang.code ? 'bg-gray-100 font-semibold' : ''
                  }`} // تغيير مظهر العنصر إذا كانت اللغة محددة
              >
                {lang.label} {/* عرض اسم اللغة */}
              </li>
            ))}
          </ul>
        </div>
      )}
    </div>
  );
};

export default LanguageSwitcher; // تصدير المكون لاستخدامه في مكونات أخرى