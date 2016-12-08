<form action="registration" method="POST">
    <table>
        <tr>
            <td>ФИО</td>
            <td><input type="text" name="name" id="name" required></td>
            <td>
                <div class="error-box name"></div>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" id="email" required></td>
            <td>
                <div class="error-box email"></div>
            </td>
        </tr>
        <tr id="area">
            <td>Список областей</td>
            <td><select id="area" class="my_select_box" data-placeholder="Выберите  из списка" name="area" required>
                    <option selected disabled>Выберите из списка</option>
                    <?php echo $data; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Список городов</td>
            <td><select id="city" class="my_select_box" data-placeholder="Выберите из списка" name="city" disabled
                        required>
                    <option selected disabled>Выберите из списка</option>
                </select></td>
        </tr>
        <tr>
            <td>Список районов</td>
            <td><select id="district" class="my_select_box" data-placeholder="Выберите из списка" name="district"
                        disabled required>
                    <option selected disabled>Выберите из списка</option>
                </select></td>
        </tr>
        <tr>
            <td><input type="submit" id="sub" value="SEND"></td>
        </tr>
    </table>
</form>