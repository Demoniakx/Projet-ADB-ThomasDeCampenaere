<?php
    $onglet = 'Contact';
    include('header.php');
?>
    <div class="container">
        <div>
            <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
        </div>
        <div class="top">
            <div>
                <h1>Contact</h1>
            </div>
            <div class="form">
                <form>
                    <label>Username :</label></br>
                    <input class="formulaire" type="text" name="username" required autofocus><br>
                    <label>Mail :</label></br>
                    <input class="formulaire" type="email" name="mail" required><br>
                    <label>Message :</label></br>
                    <input class="formulaire big" type="text" name="message" required><br> 
                    <input type="submit" class="button" name="bContact" value="Contact"></input>
                </form>
            </div>
        </div>

    </div>
   
<?php
    include('footer.php');
?>