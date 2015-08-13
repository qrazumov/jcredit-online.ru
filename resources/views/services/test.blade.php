<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                ФИО
            </th>
            <th>
                Сумма
            </th>
            <th>
                Курс доллара
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                1
            </td>
            <td>
                Разумов Александр Александрович
            </td>
            <td>
                7900 руб.
            </td>
            <td>
                {{ Currency::getCurrency()['dollar'] }}
            </td>
        </tr>
        <tr>
            <td>
                2
            </td>
            <td>
                Белкин Александр Александрович
            </td>
            <td>
                6900 руб.
            </td>
            <td>
                {{ Currency::getCurrency()['dollar'] }}
            </td>
        </tr>
        <tr>
            <td>
                3
            </td>
            <td>
                Соклаков Виталий Александрович
            </td>
            <td>
                5400 руб.
            </td>
            <td>
                {{ Currency::getCurrency()['dollar'] }}
            </td>
        </tr>
    </tbody>
</table>