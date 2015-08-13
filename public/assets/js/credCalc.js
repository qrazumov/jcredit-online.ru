window.onload = function(){
    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
    function remoteTableCalc(){
        var post = document.getElementsByClassName('post')[0];
        var table_res = document.getElementById('table_calc');
        if(table_res){
            post.removeChild(table_res);
        }

    }
    var inputFocus = document.getElementById('sum').focus();

    document.getElementById('sub').addEventListener('click', function(){

        remoteTableCalc();

        var check_an = document.getElementById('check_an');
        var check_dif = document.getElementById('check_dif');

        var sum = document.getElementById('sum').value;
        var rate = document.getElementById('rate').value;
        var term = document.getElementById('term').value;
        var monthlyFee = +document.getElementById('comission').value; // ежемесячные комиссии
        if(monthlyFee == '') monthlyFee = 0;
        /*
         if(/[\D]/i.test(sum) || /[\D]/i.test(rate) || /[\D]/i.test(term) || /[\D]/i.test(monthlyFee)
         || sum < 10000 || sum > 100000000 || rate < 1 || rate > 200 || term < 1 || term > 300
         || monthlyFee < 0 || monthlyFee > 1000000
         ){
         alert('Вы ввели не число и(или) число слишком\n большое/маленькое');
         return;
         }
         */
        if(!isNumber(sum) || !isNumber(rate) || !isNumber(term) || !isNumber(monthlyFee)
            || sum < 10000 || sum > 100000000 || rate < 1 || rate > 200 || term < 1 || term > 300
            || monthlyFee < 0 || monthlyFee > 1000000
        ){
            alert('Вы ввели не число и(или) число слишком\n большое/маленькое');
            return;
        }
        if(check_an.checked){
            //начало
            var result = {}; // объект результата
            var rateMonth = rate / (100 * 12); // процентная ставка в месяц от годовой
            rateMonth.toFixed(4);
            console.log(rateMonth);
            // фиксированный ежемесячный платеж
            var monthlyPayment = Math.abs((sum * rateMonth) / ((Math.pow((1 / (1 + rateMonth)), term)) - 1));
            monthlyPayment.toFixed(8);
            console.log(monthlyPayment);
            var persentForTheMonth = sum * rateMonth; // сумма процентов на текущий период
            console.log(persentForTheMonth);
            var principal = monthlyPayment - persentForTheMonth; // основной долг на период
            console.log(principal);
            var outstandingBalance = sum - principal; // задолженность за период
            console.log(outstandingBalance);

            // первый месяц выплат
            result[0] = {
                monthlyPayment: monthlyPayment,
                persentForTheMonth: persentForTheMonth,
                principal: principal,
                outstandingBalance: outstandingBalance
            };
            // формируем данные на весь кредитный период
            var i = 1;
            while(outstandingBalance >= -100) {
                persentForTheMonth = outstandingBalance * rateMonth;
                principal = monthlyPayment - persentForTheMonth;
                outstandingBalance -= principal;

                result[i] = {
                    persentForTheMonth: persentForTheMonth,
                    principal: principal,
                    outstandingBalance: outstandingBalance
                };
                result.length = i;
                i++;
            }
            console.log(result);

            // формируем блок вывода информации о кредите
            var overpayment = (monthlyPayment * term) - sum; // переплата
            var fullCostOfTheLoan = +sum + +overpayment; // полная стоимость кредита
            var totalInterestRate = (overpayment / sum) * 100; // итоговая процентная ставка
            console.log(fullCostOfTheLoan);
            console.log(totalInterestRate);
            console.log(monthlyPayment);


            var result_calc = document.getElementById('result_calc');
            result_calc.style.display = 'block';

            var i = 10;
            function scrollToResult(){

                window.scrollBy(0, i);

                if(window.pageYOffset >= 460){
                    return;
                }
                var x = setTimeout(scrollToResult, 10);
            }
            scrollToResult();
            var removeMonthPay = document.getElementById('monthlyPaymentHTMLTr');
            if(removeMonthPay === null){
                var tempObj = document.getElementById('result_calc');
                tempObj = document.getElementsByTagName('tbody')[4];
                var newtr = document.createElement('tr');
                newtr.setAttribute('id', 'monthlyPaymentHTMLTr');
                newtr.innerHTML = '<td class="first">Ежемесячный платеж</td><td class="second"><span id="monthlyPaymentHTML"></span> руб.</td>';
                tempObj.appendChild(newtr);

            }
            var overpaymentHTML = document.getElementById('overpaymentHTML').innerHTML = overpayment.toFixed(0);
            var fullCostOfTheLoanHTML = document.getElementById('fullCostOfTheLoanHTML').innerHTML = +fullCostOfTheLoan.toFixed(0) + +monthlyFee;
            var totalInterestRateHTML = document.getElementById('totalInterestRateHTML').innerHTML = totalInterestRate.toFixed(2);
            var monthlyPaymentHTML = document.getElementById('monthlyPaymentHTML').innerHTML = +monthlyPayment.toFixed(0) + +monthlyFee;

            // формируем таблицу вывода графика платежей
            var post = document.getElementsByClassName('post')[0];
            var table_calc = document.createElement('table');
            table_calc.setAttribute('class', 'table');
            post.appendChild(table_calc);
            table_calc.setAttribute('id', 'table_calc');
            var idx = 1;
            table_calc.innerHTML = "<thead><tr class=\"head_table_calc\"><th>№</th><th>Платеж</th><th>Основной долг</th><th>Проценты</th><th>Задолженность</th></tr></thead>";
            console.log(result.length);
            for(var m = 0; m < result.length; m++, idx++){
                var tr = document.createElement('tr');
                if(m % 2 != 0){
                    tr.style.backgroundColor = 'rgb(244, 253, 253)';
                }
                var td1 = document.createElement('td');
                td1.innerText = idx;
                var td2 = document.createElement('td');
                td2.innerText = +result[0].monthlyPayment.toFixed(2) + +monthlyFee;
                var td3 = document.createElement('td');
                td3.innerText = result[m].principal.toFixed(2);
                var td4 = document.createElement('td');
                td4.innerText = result[m].persentForTheMonth.toFixed(2);
                var td5 = document.createElement('td');
                td5.innerText = result[m].outstandingBalance.toFixed(2);
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                table_calc.appendChild(tr);
            }
        }



        if(check_dif.checked){
            //начало
            var result = {}; // объект результата
            var rateMonth = rate / (100 * 12); // процентная ставка в месяц от годовой
            rateMonth.toFixed(4);

            // основной ежемесячный платеж без процентов
            var principalPpayment = sum / term;
            principalPpayment.toFixed(8);
            // формирмуем результат на первый месяц

            // полный ежемесячный платеж на текущий период (первый месяц)
            var monthlyPayment = principalPpayment + (sum - (principalPpayment * 0)) * rateMonth;
            // сумма процентов на текущий период (первый месяц)
            var persentForTheMonth = sum * rateMonth;

            // основной долг на период (первый месяц)
            var principal = +sum;

            // первый месяц выплат
            result[0] = {
                monthlyPayment: monthlyPayment,
                persentForTheMonth: persentForTheMonth,
                principal: principal,
                principalPpayment: principalPpayment // данный показатель не изменен на весь период
            };

            for(var i = 1; i < term; i++){
                monthlyPayment = principalPpayment + (sum - (principalPpayment * i)) * rateMonth;
                principal = sum - (principalPpayment * i);
                persentForTheMonth = principal * rateMonth;

                result[i] = {
                    monthlyPayment: monthlyPayment,
                    persentForTheMonth: persentForTheMonth,
                    principal: principal
                };
            }
            console.log(result);

            // формируем блок вывода информации о кредите
            var overpayment = Number(0); // переплата
            for(var i = 0; i < term; i++){
                overpayment += +result[i].monthlyPayment;
            }
            overpayment -= +sum;
            console.log(overpayment);
            var fullCostOfTheLoan = +sum + +overpayment; // полная стоимость кредита
            var totalInterestRate = (overpayment / sum) * 100; // итоговая процентная ставка
            console.log(fullCostOfTheLoan);
            console.log(totalInterestRate);
            console.log(monthlyPayment);
            var result_calc = document.getElementById('result_calc');
            result_calc.style.display = 'block';
            var i = 10;
            function scrollToResult(){
                window.scrollBy(0, i);
                if(window.pageYOffset >= 460){
                    return;
                }
                var x = setTimeout(scrollToResult, 10);
            }
            scrollToResult();
            var overpaymentHTML = document.getElementById('overpaymentHTML').innerHTML = overpayment.toFixed(0);
            var fullCostOfTheLoanHTML = document.getElementById('fullCostOfTheLoanHTML').innerHTML = +fullCostOfTheLoan.toFixed(0) + +monthlyFee;
            var totalInterestRateHTML = document.getElementById('totalInterestRateHTML').innerHTML = totalInterestRate.toFixed(2);
            var removeMonthPay = $('#monthlyPaymentHTMLTr').remove(); // удаляем методами jQuery



            // формируем таблицу вывода графика платежей
            var post = document.getElementsByClassName('post')[0];
            var table_calc = document.createElement('table');
            post.appendChild(table_calc);
            table_calc.setAttribute('class', 'table');
            table_calc.setAttribute('id', 'table_calc');
            var idx = 1;
            table_calc.innerHTML = "<thead><tr class=\"head_table_calc\"><th>№</th><th>Ежемесячный платеж</th><th>Основной долг</th><th>Проценты</th><th>Задолженность</th></thead></tr>";


            for(var m = 0; m < term; m++, idx++){
                var tr = document.createElement('tr');
                if(m % 2 != 0){
                    tr.style.backgroundColor = 'rgb(244, 253, 253)';
                }
                var td1 = document.createElement('td');
                td1.innerText = idx;
                var td2 = document.createElement('td');
                td2.innerText = result[m].monthlyPayment.toFixed(2);
                var td3 = document.createElement('td');
                td3.innerText = +result[0].principalPpayment.toFixed(2) + +monthlyFee;
                var td4 = document.createElement('td');
                td4.innerText = result[m].persentForTheMonth.toFixed(2);
                var td5 = document.createElement('td');
                td5.innerText = result[m].principal.toFixed(2);
                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                table_calc.appendChild(tr);
            }

        }





        ////////////////
    }, false);

}
