<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    :root {
/* colors*/
  --united-nations-blue: hsl(99, 56%, 58%);
  --bright-navy-blue: hsl(94, 73%, 41%);
  --spanish-gray: hsl(0, 0%, 60%);
  --black-coral: hsl(225, 8%, 42%);
  --oxford-blue: hsl(109, 97%, 12%);
  --yale-blue: hsl(159, 95%, 17%);
  --blue-ncs: hsl(159, 92%, 24%);
  --gunmetal: hsl(149, 88%, 13%);
  --gainsboro: hsl(0, 0%, 88%);
  --cultured: hsl(0, 0%, 98%);
  --white: hsl(0, 0%, 100%);
  --black: hsl(0, 0%, 0%);
  --onyx: hsl(0, 0%, 25%);
  --jet: hsl(0, 0%, 20%);
/*typography*/
  --ff-poppins: "Poppins", sans-serif;
  --ff-montserrat: "Montserrat", sans-serif;
  --ff-SedgwickAveDisplay:"Sedgwick Ave Display";

  --fs-1: calc(20px + 3.5vw);
  --fs-2: calc(18px + 1.6vw);
  --fs-3: calc(16px + 0.45vw);
  --fs-4: 15px;
  --fs-5: 14px;
  --fs-6: 13px;
  --fs-7: 12px;
  --fs-8: 11px;

  --fw-500: 500;
  --fw-600: 600;
  --fw-700: 700;
  --fw-800: 800;

  --transition: 0.25s ease-in-out;
  --section-padding: 30px;
  --radius-15: 15px;
  --radius-25: 25px;
}
*, *::before, *::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


ion-icon { pointer-events: none; }



/*Commonly Used*/
.container1 { 
  padding-inline: 15px; 
}
.btn {
  color: var(--white);
  text-transform: uppercase;
  font-size: var(--fs-5);
  border-radius: 100px;
  padding: var(--padding, 8px 18px);
  border: var(--border-width, 2px) solid transparent;
  transition: var(--transition);
}
.btn-primary {
  background: var(--bright-navy-blue);
  border-color: var(--bright-navy-blue);
}
.btn-primary:is(:hover, :focus) {
  background: var(--yale-blue);
  border-color: var(--yale-blue);
}
.btn-secondary { 
  border-color: var(--white); 
}
.btn-secondary:is(:hover, :focus) { 
  background: hsla(0, 0%, 100%, 0.1); 
}

/*Footer*/

.footer-top {
  background: var(--gunmetal);
  padding-block: var(--section-padding);
  color: var(--gainsboro);
}
.footer-brand { 
  margin-bottom: 30px; 
}
.footer-brand img { 
  width: 180px; 
}
.footer-brand .logo { 
  margin-bottom: 20px; 
}
.footer-text {
  font-size: var(--fs-5);
  line-height: 1.7;
}
.footer-contact { 
  margin-bottom: 30px; 
}
.contact-title {
  position: relative;
  font-family: var(--ff-montserrat);
  font-weight: var(--fw-500);
  margin-bottom: 30px;
}
.contact-title::after {
  content: "";
  position: absolute;
  bottom: -10px;
  left: 0;
  width: 50px;
  height: 2px;
  background: var(--bright-navy-blue);
}
.contact-text {
  font-size: var(--fs-5);
  margin-bottom: 15px;
  max-width: 200px;
}
.contact-item {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}
.contact-item ion-icon { 
  --ionicon-stroke-width: 40px; 
}
.contact-link,address {
  font-style: normal;
  color: var(--gainsboro);
  font-size: var(--fs-5);
}
.contact-link:is(:hover, :focus) { 
  color: var(--white); 
}
.form-text {
  font-size: var(--fs-5);
  margin-bottom: 20px;
}
.footer-form .input-field {
  background: var(--white);
  font-size: var(--fs-5);
  padding: 15px 20px;
  border-radius: 100px;
  margin-bottom: 10px;
}
.footer-form .btn {
   width: 100%; 
  }
.footer-bottom {
  --gunmetal: hsl(130, 90%, 8%);
  background: var(--gunmetal);
  padding-block: 20px;
  text-align: center;
}
.copyright {
  color: var(--gainsboro);
  font-size: var(--fs-5);
  margin-bottom: 10px;
}
.copyright a {
  color: inherit;
  display: inline-block;
}
.copyright a:is(:hover, :focus) { 
  color: var(--white); 
}
.footer-bottom-list {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 21px;
}
.footer-bottom-list > li { 
  position: relative; 
}
.footer-bottom-list > li:not(:last-child)::after {
  content: "";
  position: absolute;
  top: 3px;
  right: -10px;
  bottom: 3px;
  width: 1px;
  background: hsla(0, 0%, 100%, 0.2);
}
.footer-bottom-link {
  color: var(--gainsboro);
  font-size: var(--fs-7);
  transition: var(--transition);
}
.footer-bottom-link:is(:hover, :focus) { 
  color: var(--white); }

/*MEDIA QUERIES*/

@media (min-width: 580px) {
  .container1 {
    max-width: 580px;
    margin-inline: auto;
  }
  .btn {
    --fs-5: 16px;
    --padding: 12px 30px;
  }
  .btn-group { 
    gap: 20px; 
  }
  .footer .container1 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }
  .footer-form { 
    grid-column: span 2; 
  }
  .footer-bottom { 
    text-align: left; 
  }
  .copyright {
     margin-bottom: 0; 
    }
  .footer-bottom-list { 
    justify-content: flex-end; 
  }
}

@media (min-width: 768px) {
  .container1 { 
    max-width: 800px;
   }
  .helpline-box {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 10px;
  }
  .helpline-box .wrapper {
    display: block;
    color: var(--white);
    font-size: var(--fs-6);
  }
  .form-wrapper {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 20px;
  }
  .footer-form .input-field {
     margin-bottom: 0; 
  }
  .footer-form .btn {
     width: max-content; 
  }
}

@media (min-width: 992px) {
  .container1 {
    max-width: 1050px; 
  }
  .footer-top .container1 {
    grid-template-columns: repeat(3, 1fr);
    gap: 50px;
  }
  .footer-form { 
    grid-column: unset;
  }
  .form-wrapper {
    flex-direction: column; 
  }
  .footer-form .btn { 
    width: 100%; 
  }
}

@media (min-width: 1200px) {
  .container1 { max-width: 1180px; }

}


</style>
<body>
     <!--Footer-->
  <footer class="footer">
    <div class="footer-top">
      <div class="container1">
        <div class="footer-brand">
          <a href="#" class="logo">
            <h1 style=" font-family:Kaushan Script;  font-size:40px; color:rgb(208, 237, 178)">CampGO</h1>
          </a>
          <p class="footer-text">For a safe and exciting nights under the stars according to your preference for a reasonable budget.</p>
        </div>
        <div class="footer-contact">
          <h4 class="contact-title">Contact Us</h4>
          <p class="contact-text">Feel free to contact and reach us !!</p>
          <ul>
            <li class="contact-item">
              <ion-icon name="call-outline"></ion-icon>
              <a href="tel:+01123456790" class="contact-link">+94 011 2248257</a>
            </li>
            <li class="contact-item">
              <ion-icon name="mail-outline"></ion-icon>
              <a href="mailto:info.tourly.com" class="contact-link">campgo@gmail.com</a>
            </li>
            <li class="contact-item">
              <ion-icon name="location-outline"></ion-icon>
              <address>No.31,Borella,Colombo 05</address>
            </li>
          </ul>
        </div>
        <div class="footer-form">
          <p class="form-text">Subscribe our newsletter for more update & news !!</p>
          <form action="" class="form-wrapper">
            <input type="email" name="email" class="input-field" placeholder="Enter Your Email" required>
            <button type="submit" class="btn btn-secondary">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <p class="copyright">&copy; 2023 <a href="">Group 06</a>. All rights reserved</p>
        <ul class="footer-bottom-list">
          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>
          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>
          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  <!-- ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>