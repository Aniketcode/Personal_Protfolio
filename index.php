<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "protfolio";

$nameErr = "";
$message = ""; // Initialize the message variable
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact(name,email,subject,message) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $message = '<div class="alert">
                        <span class="closebtn">&times;</span>
                        Your message has been sent successfully!
                    </div>';
    } else {
        $message = '<div class="alert2">
                        <span class="closebtn">&times;</span>
                        Something went wrong!
                    </div>' . $stmt->error;
    }

    $stmt->close();
}
?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />


    <style>
        .alert {
            padding: 20px;
            background-color: green;
            color: white;
            font-size: large;

        }

        .alert2 {
            padding: 20px;
            background-color: red;
            color: white;
            font-size: large;

        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

        /* Read more read less */
        #more-text {
            display: none;
        }

        a#read-more {
            background: rgb(57, 36, 142);
            color: #fff;
           
           
            margin-top: 20px;
            font-weight: 100;
            border-radius: 6px;
            border: 2px solid rgb(57, 36, 142);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }

        a#read-more:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php echo $message; ?>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>


    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="#">Portfo<span>lio.</span></a></div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#about" class="menu-btn">About</a></li>
                <li><a href="#services" class="menu-btn">Services</a></li>
                <li><a href="#skills" class="menu-btn">Skills</a></li>

                <li><a href="#contact" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">Hello, my name is</div>
                <div class="text-2">Aniket kumar</div>
                <div class="text-3">And I'm a <span class="typing"></span></div>
                <a href="https://www.linkedin.com/in/aniket-kumar-singh-6424ba202" target="_blank">Hire me</a>
            </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About me</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="assets/Image.jpg" alt="">
                </div>
                <div class="column right">
                    <div class="text">I'm Aniket kumar and I'm a <span class="typing-2"></span></div>
                    <p>Hello everyone ,currently I have completed Master's in Computer Application(MCA).Alongside
                        my studies,I also work as a freelancer.I have a strong passion for web development data analysis
                        etc,and I enjoy taking
                        on diverse projects that allow me to expand my skills and knowledge.I look forward to applying
                        my
                        academic knowledge and practical experience to create valuable solutions for my clients.
                    </p>
                    <a href="assets/Aniket_Resume.pdf" target="_blank">Download CV</a>
                </div>
            </div>
        </div>
    </section>

    <!-- services section start -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">My services</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-paint-brush"></i>
                        <div class="text">Web Design</div>
                        <p>'m passionate about crafting beautiful and user-friendly web designs. If you have a project
                            that needs a creative touch or if you want to discuss the latest trends in web design, I'd
                            love to hear from you.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-chart-line"></i>
                        <div class="text">Web development</div>
                        <p>As a web developer, I thrive on transforming ideas into dynamic, user-friendly websites.
                            Whether you need a robust back-end solution or a stunning front-end design, I have the
                            skills to deliver high-quality web applications. Let's collaborate to bring your digital
                            vision to life.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-code"></i>
                        <div class="text">Apps Design</div>
                        <p>I’m passionate about designing intuitive and visually appealing mobile and web applications.
                            If you have an app idea that needs a creative touch or want to discuss the latest trends in
                            app design, let's connect.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- skills section start -->
    <section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">My skills</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">My creative skills & experiences.</div>
                    <p id="short-text">
                        Tackling complex problems and developing efficient algorithms and solutions.
                        Designing scalable and maintainable software using OOP principles.
                        Creating visually appealing and responsive web pages using HTML, CSS, and JavaScript.
                    </p>
                    <p id="more-text" style="display: none;">
                        Building robust server-side applications with PHP and managing databases with MySQL.
                        Combining front-end and back-end skills to develop complete web applications.
                    </p>
                    <a href="#" id="read-more">Read more</a>
                </div>
                <div class="column right">
                    <div class="bars">
                        <div class="info">
                            <span>HTML</span>
                            <span>90%</span>
                        </div>
                        <div class="line html"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>CSS</span>
                            <span>60%</span>
                        </div>
                        <div class="line css"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>JavaScript</span>
                            <span>50%</span>
                        </div>
                        <div class="line js"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>PHP</span>
                            <span>50%</span>
                        </div>
                        <div class="line php"></div>
                    </div>
                    <div class="bars">
                        <div class="info">
                            <span>MySQL</span>
                            <span>70%</span>
                        </div>
                        <div class="line mysql"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p>I’m always excited to connect with fellow developers, tech enthusiasts, and potential
                        collaborators. Whether you have a project in mind, need some technical advice, or just want to
                        chat about the latest in technology, feel free to reach out.</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">Aniket Kumar Singh</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">India,Bandel</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">mailsinghaniket@gmail.com</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-phone"></i>
                            <div class="info">
                                <div class="head">Phone</div>
                                <div class="sub-title">7980361004</div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="field email">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" name="message" rows="10" placeholder="Message.." required></textarea>
                        </div>
                        <div class="button-area">
                            <button type="submit">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section start -->
    <footer>
        <span>Created By <a>Aniket Kumar</a> | <span class="far fa-copyright"></span> 2023 All rights reserved.</span>
    </footer>

    <script src="script.js"></script>
    <script>
        // Read more read less using jQuery
        $(document).ready(function() {
            $("#read-more").click(function(event) {
                event.preventDefault();
                var moreText = $("#more-text");
                var shortText = $("#short-text");

                if (moreText.is(":visible")) {
                    moreText.hide();
                    $(this).text("Read more");
                } else {
                    moreText.show();
                    $(this).text("Read less");
                }
            });
        });
        // Alert close button
        $(document).on('click', '.closebtn', function() {
            $(this).parent('.alert').hide();
        });
    </script>
</body>

</html>