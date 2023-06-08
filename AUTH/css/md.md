@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #e4e9f7;
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}

.box {
    background: #fdfdfd;
    display: flex;
    flex-direction: column;
    padding: 25px 25px;
    border-radius: 20px;
    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
        0 32px 64px -48px rgba(0, 0, 0, 0.5);
}

.image-container {
    height: 100px;
    width: 100%;
    /* background-color: #b4a9a9; */
    display: flex;
    justify-content: center;
    align-items: center;
}

.image-container img {
    height: 100%;
    width: 100px;
}

.form-box {
    width: 450px;
    margin: 0px 10px;
}

.form-box header {
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
    margin-bottom: 10px;
    text-align: center;
}

.form-box form .field {
    display: flex;
    margin-bottom: 10px;
    flex-direction: column;

}

.form-box form .input input {
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}

.btn {
    height: 35px;
    /* background: rgba(76,68,182,0.808); */
    background-color: #21BC10;
    border: 0;
    border-radius: 5px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    transition: all .3s;
    margin-top: 10px;
    padding: 0px 10px;
}

.btn:hover {
    opacity: 0.82;
}

.submit {
    width: 100%;
}

.links {
    margin-bottom: 15px;
}

.links a {
    text-decoration: none;
}

.links a:hover {
    text-decoration: underline;
}

/********* Home *****************/

.nav {
    background: #fff;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    line-height: 60px;
    z-index: 100;
}

.logo {
    font-size: 25px;
    font-weight: 900;

}

.logo a {
    text-decoration: none;
    color: #000;
}

.right-links a {
    padding: 0 10px;
}

main {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 60px;
}

.main-box {
    display: flex;
    flex-direction: column;
    width: 70%;
}

.main-box .top {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.bottom {
    width: 100%;
    margin-top: 20px;
}

@media only screen and (max-width:840px) {
    .main-box .top {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .top .box {
        margin: 10px 10px;
    }

    .bottom {
        margin-top: 0;
    }
}

.message {
    text-align: center;
    background: #f9eded;
    padding: 15px 0px;
    border: 1px solid #699053;
    border-radius: 5px;
    margin-bottom: 10px;
    color: red;
}


nav bar
.form-inline {
    display: inline-block;
}

.navbar-header.col {
    padding: 0 !important;
}

.navbar {
    background: #fff;
    padding-left: 16px;
    padding-right: 16px;
    border-bottom: 1px solid #d6d6d6;
    box-shadow: 0 0 4px rgba(0, 0, 0, .1);
}

.nav-link img {
    border-radius: 50%;
    width: 36px;
    height: 36px;
    margin: -8px 0;
    float: left;
    margin-right: 10px;
}

.navbar .navbar-brand {
    color: #555;
    padding-left: 0;
    padding-right: 50px;
    font-family: 'Merienda One', sans-serif;
}

.navbar .navbar-brand i {
    font-size: 20px;
    margin-right: 5px;
}

.search-box {
    position: relative;
}

.search-box input {
    box-shadow: none;
    padding-right: 35px;
    border-radius: 3px !important;
}

.search-box .input-group-addon {
    min-width: 35px;
    border: none;
    background: transparent;
    position: absolute;
    right: 0;
    z-index: 9;
    padding: 7px;
    height: 100%;
}

.search-box i {
    color: #a0a5b1;
    font-size: 19px;
}

.navbar .nav-item i {
    font-size: 18px;
}

.navbar .dropdown-item i {
    font-size: 16px;
    min-width: 22px;
}

.navbar .nav-item.open>a {
    background: none !important;
}

.navbar .dropdown-menu {
    border-radius: 1px;
    border-color: #e5e5e5;
    box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
}

.navbar .dropdown-menu a {
    color: #777;
    padding: 8px 20px;
    line-height: normal;
}

.navbar .dropdown-menu a:hover,
.navbar .dropdown-menu a:active {
    color: #333;
}

.navbar .dropdown-item .material-icons {
    font-size: 21px;
    line-height: 16px;
    vertical-align: middle;
    margin-top: -2px;
}

.navbar .badge {
    color: #fff;
    background: #f44336;
    font-size: 11px;
    border-radius: 20px;
    position: absolute;
    min-width: 10px;
    padding: 4px 6px 0;
    min-height: 18px;
    top: 5px;
}

.navbar a.notifications,
.navbar a.messages {
    position: relative;
    margin-right: 10px;
}

.navbar a.messages {
    margin-right: 20px;
}

.navbar a.notifications .badge {
    margin-left: -8px;
}

.navbar a.messages .badge {
    margin-left: -4px;
}

.navbar .active a,
.navbar .active a:hover,
.navbar .active a:focus {
    background: transparent !important;
}

@media (min-width: 1200px) {
    .form-inline .input-group {
        width: 300px;
        margin-left: 30px;
    }
}

@media (max-width: 1199px) {
    .form-inline {
        display: block;
        margin-bottom: 10px;
    }

    .input-group {
        width: 100%;
    }
}

/* .rounded-popup {
   position: fixed;
   width: 50%;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   background-color: #fff;
   padding: 20px;
   border-radius: 10px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
   z-index: 9999;
} */