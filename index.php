<!--This website needs an internet connection to run-->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/styles/styles.css" />
  <link rel="icon" href="https://www.foodgloriousfoodsouth.co.uk/wp-content/uploads/2015/09/fgf-logo.png">
  <title>Home page</title>
</head>

<body>
  <?php require("/partials/nav.php"); ?>

  <div class="welcome">
    <h1>CURB YOUR APPETITE!</h1>
    <p>
      Here at FGF we seek to satisfy your appetite and offer your favorite organic
      foods
    </p>
    <a class="order_call" href="view-items.php">
      <?php
      if (isset($_SESSION['utype'])) {
        if ($_SESSION['utype'] === 'Admin' || $_SESSION['utype'] === 'SuperAdmin') {
          echo "View items here";
        } else if ($_SESSION['utype'] === 'Delivery') {
          echo "View deliveries for today";
        } else {
          echo "Order your food here";
        }
      } else {
        echo "Order your food here";
      }
      ?>
    </a>
  </div>

  <main>
    <div class="benefits">
      <article>
        <ul>
          <li>
            <h2>Why use FGF?</h2>
            <p>
              We deliver fresh produce from our suppliers to your doorstep. We also guarantee a delivery time of less than an hour wherever you are in the town through our multiple branches. Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Our crops are grown and monitored using the latest and most efficient technologies to ensure the utmost quality for healthy living.
              Shop with FGF and see your needs satisfied!
            </p>
          </li>
          <li>
            <h2>Something about organic food.</h2>
            <p>
              They say "an apple a day keeps the doctor away" for a reason. Fruits and vegetables are known for years to improve the health of those who take them.
              Organic foods often have more beneficial nutrients, such as antioxidants, than their conventionally-grown counterparts and people with allergies to foods, chemicals, or preservatives may find their symptoms lessen or go away when they eat only organic foods.

            </p>
          </li>
        </ul>
      </article>
    </div>

    <div class="features">
      <h2>What should you expect from us?</h2>
      <ul>
        <li>Fast delivery</li>
        <li>Low delivery cost</li>
        <li>Hygienic handling of food from the kitchen to your doorstep</li>
        <li>Strict Covid-19 protocols taken with our products</li>
        <li>Safe and neat food packaging</li>
        <li>Inclusion of utensils if needed</li>
        <li>Promotions that grant discounts on food ordered</li>
      </ul>
    </div>

    <br>

    <div class="testimonials">
      <h2>Testimonials</h2>
      <h5>Words from trusted sources</h5>
      <ul>
        <li>
          <img src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2015/06/06/15/Chris-Pratt.jpg?width=982&height=726&auto=webp&quality=75" alt="person1">
          <p>Person One <span>Engineer</span></p>
          <blockquote>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, expedita. Ducimus, itaque. Voluptatem, enim alias necessitatibus sequi quos at amet.
          </blockquote>
        </li>
        <li>
          <img src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2021/02/Female_Portrait_1296x728-header-1296x729.jpg?w=1155&h=2268" alt="person2">
          <p>Person Two <span>Doctor</span></p>
          <blockquote>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, expedita. Ducimus, itaque. Voluptatem, enim alias necessitatibus sequi quos at amet.
          </blockquote>
        </li>
        <li>
          <img src="https://img.etimg.com/thumb/msid-78362778,width-640,resizemode-4,imgsize-116841/obama.jpg" alt="person3">
          <p>Person Three <span>President</span></p>
          <blockquote>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, expedita. Ducimus, itaque. Voluptatem, enim alias necessitatibus sequi quos at amet.
          </blockquote>
        </li>
      </ul>
    </div>
  </main>

  <?php require("/partials/footer.php") ?>
</body>

</html>