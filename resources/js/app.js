import './bootstrap';
import Alpine from 'alpinejs';
import VMasker from 'vanilla-masker';

window.Alpine = Alpine;
Alpine.start();

VMasker(document.querySelectorAll('.phone-mask')).maskPattern('(99) 99999-9999');
VMasker(document.querySelectorAll('.cpf-mask')).maskPattern('999.999.999-99');
VMasker(document.querySelectorAll('.cnpj-mask')).maskPattern('99.999.999/9999-99');
VMasker(document.querySelectorAll('.cep-mask')).maskPattern('99999-999');
VMasker(document.querySelectorAll('.date-mask')).maskPattern('99/99/9999');
VMasker(document.querySelectorAll('.time-mask')).maskPattern('99:99');
// VMasker(document.querySelectorAll('.money-mask')).maskPattern('999.999.999.999.999,99');
VMasker(document.querySelectorAll('.money-mask')).maskMoney();
VMasker(document.querySelectorAll('.percent-mask')).maskPattern('99,99%');
