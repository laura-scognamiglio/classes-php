<!DOCTYPE html>
<html lang="en" class="insHtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body class ="insBody">
        <main>
            <section class= "formulaire">
                <h2 class= "sous-titre" >Connexion</h2>
                <form class= "form"  method= "post">
                
                        <div class= "form-group">
                            <input type= "text" name= "login" placeholder= "login" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "password" name= "password" placeholder= "password" autocomplete= "off">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name= "valider" class="btn ">Valider</button>
                        </div> 
                        <div class="form-group">
                            <button type="submit" name= "logout" class="btn ">Deco</button>
                        </div> 
                        <div class="form-group">
                            <button type="submit" name= "delete" class="btn ">Delete</button>
                        </div> 
                </form>
            </section>
            <section class= "formulaireIns">
                <h2 class= "sous-titre" >Inscription</h2>
                <form class= "formIns"  method= "post">
                
                        <div class= "form-group">
                            <input type= "text" name= "login" placeholder= "login" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "password" name= "password" placeholder= "password" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "text" name= "email" placeholder= "email" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "text" name= "firstname" placeholder= "firstname" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "text" name= "lastname" placeholder= "lastname" autocomplete= "off">
                        </div>
                        <div class="form-group">
                            <button type="submit" name= "submit" class="btn ">Valider</button>
                        </div> 
                        <div class="form-group">
                            <button type="submit" name= "logout" class="btn ">Deco</button>
                        </div> 
                </form>
            </section>
            <section class= "formulaireUp">
                <h2 class= "sous-titre" >Update</h2>
                <form class= "formUp"  method= "post">
                
                        <div class= "form-group">
                            <input type= "text" name= "newlogin" placeholder= "newlogin" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "password" name= "newpassword" placeholder= "newpassword" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "text" name= "newemail" placeholder= "newemail" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "text" name= "newfirstname" placeholder= "newfirstname" autocomplete= "off">
                        </div>
                        <div class= "form-group">
                            <input type= "text" name= "newlastname" placeholder= "newlastname" autocomplete= "off">
                        </div>
                        <div class="form-group">
                            <button type="submit" name= "update" class="btn ">Update</button>
                        </div> 
                </form>
            </section>
        </main>
    </body>
</html>
