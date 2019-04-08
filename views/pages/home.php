<?php include '../views/partials/header.php' ?>

<h1>Home</h1>

<article>
    <h3>Page 1</h3>
    <p>Sent to the API</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laudantium cupiditate veritatis explicabo aliquid ratione cumque, tempora itaque laboriosam repellendus ad, quidem ipsam, voluptate vel? Explicabo laborum eos quisquam aliquid.</p>
    <a href="<?= URL ?>page/1">Read more</a>
</article>

<article>
    <h3>Page 2</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laudantium cupiditate veritatis explicabo aliquid ratione cumque, tempora itaque laboriosam repellendus ad, quidem ipsam, voluptate vel? Explicabo laborum eos quisquam aliquid.</p>
    <a href="<?= URL ?>page/2">Read more</a>
</article>


<!-- Exemple of post rendering POST -->

<h1>Add Line in Database</h1>
    <form action="#" method="post">
        <div>
            <textarea required name="input1" cols="50" rows="5" placeholder="text..."></textarea>
        </div>
        <div>
            <input required name="input2" type="datetime-local">
        </div>
        <div>

        <?php
            $exemp = [
                1,
                2,
                3,
                4
            ];
        ?>

            <select name="input3">
                <?php foreach($exemp as $_exemp): ?>
                    <option value="<?= $_exemp ?>"><?= $_exemp ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>

    <h1>Database</h1>

    <table>
        <tr>
            <th>Text</th>
            <th>Date</th>
            <th>entier</th>
        </tr>

        <?php foreach($returnedData as $_returnedData): ?>
            <tr>
                <td><?= $_returnedData->column1 ?></td>
                <td><?= date('d/m/Y H:i', $_returnedData->column2) ?></td>
                <td><?= $_returnedData->column3 ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


<?php include '../views/partials/footer.php' ?>