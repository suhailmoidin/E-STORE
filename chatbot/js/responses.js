function getBotResponse(input) {
    if (input.toLowerCase() == "products") {
        return "Mobiles,Laptops, Fans, Tablets, Earphones and Televisions";
    } else if (input.match(/laptop/i)) {
        window.open('http://localhost/E-store/home/search.php?category_id=4');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    } else if (input.match(/ear/i)|| input.match(/head/i)) {
        window.open('http://localhost/E-store/home/search.php?category_id=9');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    } else if (input.match(/mobile/i)|| input.match(/phone/i)) {
        window.open('http://localhost/E-store/home/search.php?category_id=5');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    } else if (input.match(/fan/i)) {
        window.open('http://localhost/E-store/home/search.php?category_id=6');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    } else if (input.match(/tab/i)) {
        window.open('http://localhost/E-store/home/search.php?category_id=7');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    } else if (input.match(/tv/i)||input.match(/tele/i)) {
        window.open('http://localhost/E-store/home/search.php?category_id=8');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    } else if (input.match(/about/i) || input.match(/contact/i) ||input.match(/support/i) || input.match(/help/i) ) {
        return "You can contact us for queries via email: adityaparkala@gmail.com";
    } else if (input.toLowerCase() == "hi" || input.match(/hello/i) || input.match(/hey/i)) {
        return "Hi, I'm Aditya, your virtual assistant. You can text me what you want from our site. I will try my best to fetch it for you :)";
    } else if (input.match(/brand/i)) {
        return "Our brands ranges from Apple, Samsung, Usha and many more. I can take you to product pages based on your device. If you wish so, please text me your device:";

    } else if(input.match(/order/i)){
        window.open('http://localhost/E-store/home/orders.php');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    }else if(input.match(/profile/i)){
        window.open('http://localhost/E-store/home/profile.php');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    }else if(input.match(/cart/i)){
        window.open('http://localhost/E-store/home/cart.php');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    }else if(input.match(/checkout/i)||input.match(/check out/i)){
        window.open('http://localhost/E-store/home/checkout.php');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    }else if(input.match(/logout/i)||input.match(/log out/i)){
        window.open('http://localhost/E-store/authenticate/login.php');
        return "There you go, Your required page is opened in the adjacent tab ;)";
    }else if (input.match(/thank/i)) {
        return "You're most welcome";
    } else {
        return "Try asking something else!";
    }
}
