<?php require_once "controllerUserData.php"; ?>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Only Goods</title>
  <link rel="stylesheet" href="accountcreation.css">
  <link rel="stylesheet" href="account_design.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


  <script>
    function matchPassword(pswd1, pswd2) {
      var pw1 = document.getElementById("pswd1").value;
      var pw2 = document.getElementById("pswd2").value;
      if (pw1 != pw2) {
        alert("Password did not match");
        header("location: signup.php");
      }
    }

    function myFunction() {
      var x = document.getElementById("pswd1");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function myFunction2() {
      var x = document.getElementById("pswd2");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>


  <script>
    $(document).ready(function() {
      $('.clickme').click(function(e) {
        e.preventDefault();

        boxh = $('#popup').height();
        windowh = $(window).height();

        $('#popup').css('margin-top', windowh / 2 - boxh / 2);

        $('#popup').fadeIn();
      });
      $('.clicktoclose').click(function() {
        $('#popup').fadeOut;
      });
    });
  </script>

</head>

<body>
  <div class="signup">
    <img src="images/userbg.jpg" alt="UserBG" class="img-responsive" height="620">
    <div class="center">
      <h1 style="color:#56382d; font-family: Abril Fatface, cursive;">Only Goods<br><span class="iconify" data-icon="bx:bx-user-circle" style="margin-top: 5px;" data-width="70" data-height="70"></span></h1>
      <form action="signup.php" method="POST" autocomplete="">
        <?php
        if (count($errors) == 1) {
        ?>
          <div class="alert alert-danger text-center">
            <?php
            foreach ($errors as $showerror) {
              echo $showerror;
            }
            ?>
          </div>
        <?php
        } elseif (count($errors) > 1) {
        ?>
          <div class="alert alert-danger">
            <?php
            foreach ($errors as $showerror) {
            ?>
              <li><?php echo $showerror; ?></li>
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>
        <div class="form-group">
          <div class="txt_field">
            <input type="email" name="email" required>
            <span></span>
            <label style="font-size: 20px;">Email</label>
          </div>
          <div class="txt_field">
            <input type="text" name="fname" required>
            <span></span>
            <label style="font-size: 20px;">First Name</label>
          </div>
          <div class="txt_field">
            <input type="text" name="lname" required>
            <span></span>
            <label style="font-size: 20px;">Last Name</label>
          </div>
          <div class="txt_field">
            <input type="text" name="username" required>
            <span></span>
            <label style="font-size: 20px;">Username</label>
          </div>
          <div class="txt_field">
            <input type="password" id="pswd1" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character" required><i class="far fa-eye" onclick="myFunction()" style="margin-left: -30px; cursor: pointer;"></i>
            <span></span>
            <label style="font-size: 20px;">Password</label>
          </div>
          <div class="txt_field">
            <input type="password" id="pswd2" name="cpassword" required><i class="far fa-eye" onclick="myFunction2()" style="margin-left: -30px; cursor: pointer;"></i>
            <span></span>
            <label style="font-size: 20px;">Confirm Password</label>
          </div>

          <div>
            <input id="checkbox" type="checkbox" required />
            <label for="checkbox" style="font-size: 18px;"> I agree to these <a href="#" data-toggle="modal" data-target="#exampleModalLong" required>Terms and Conditions</a> and <a href="#" data-toggle="modal" data-target="#exampleModalLong2" required>Privacy Policy</a>.</label>
          </div>
        </div>
        <div class="form-group">
          <input class="form-control button" type="submit" name="signup" value="R e g i s t e r">
        </div>
        <div class="link login-link text-center">Already a member? <a href="signin.php">Login here</a></div>
      </form>
    </div>
  </div>


  <!-- Modal Terms & Conditions -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!--<h4>Terms and Conditions</h4>-->
          <p>
            Welcome to only goods!<br><br>
            These terms and conditions outline the rules and regulations for the use of only goods's Website, located at www.onlygoods.com.<br><br>
            By accessing this website we assume you accept these terms and conditions. Do not continue to use only goods if you do not agree to take all of the terms and conditions stated on this page.<br><br>
            The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.<br><br>
          </p>

          <h4>Cookies</h4>
          <p>
            We employ the use of cookies. By accessing only goods, you agreed to use cookies in agreement with the only goods's Privacy Policy.<br><br>
            Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.<br><br>
          </p>

          <h4>License</h4>
          <p>
            Unless otherwise stated, only goods and/or its licensors own the intellectual property rights for all material on only goods. All intellectual property rights are reserved. You may access this from only goods for your own personal use subjected to restrictions set in these terms and conditions.<br><br>
            You must not:<br>
          <ul style="padding-left:10px;">
            <li>Republish material from only goods</li>
            <li>Sell, rent or sub-license material from only goods</li>
            <li>Reproduce, duplicate or copy material from only goods</li>
            <li>Redistribute content from only goods</li>
          </ul>

          This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the Terms And Conditions Template.<br><br>
          Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. only goods does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of only goods,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, only goods shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.<br><br>
          only goods reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.<br><br>
          You warrant and represent that:<br><br>
          <ul style="padding-left:10px;">
            <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
            <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
            <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
            <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
          </ul>
          You hereby grant only goods a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.<br><br>
          </p>

          <h4>Hyperlinking our content</h4>
          <p>
            The following organizations may link to our Website without prior written approval:<br>
          <ul style="padding-left:10px;">
            <li>Government agencies;</li>
            <li>Search engines;</li>
            <li>News organizations;</li>
            <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
            <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
          </ul>
          These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.<br><br>

          We may consider and approve other link requests from the following types of organizations:<br><br>
          <ul style="padding-left:10px;">
            <li>commonly-known consumer and/or business information sources;</li>
            <li>dot.com community sites;</li>
            <li>associations or other groups representing charities;</li>
            <li>online directory distributors;</li>
            <li>internet portals;</li>
            <li>accounting, law and consulting firms; and</li>
            <li>educational institutions and trade associations.</li>
          </ul>
          We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of only goods; and (d) the link is in the context of general resource information.<br><br>
          These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party’s site.<br><br>
          If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to only goods. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.<br><br>
          Approved organizations may hyperlink to our Website as follows:<br><br>
          <ul style="padding-left:10px;">
            <li>By use of our corporate name; or</li>
            <li>By use of the uniform resource locator being linked to; or</li>
            <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>
          </ul>
          No use of only goods's logo or other artwork will be allowed for linking absent a trademark license agreement.<br><br>
          </p>


          <h4>iFrames</h4>
          <p>
            Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.<br><br>
          </p>


          <h4>Content Liability</h4>
          <p>
            We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.<br><br>
          </p>


          <h4>Your Privacy</h4>
          <p>Please read Privacy Policy.</p>


          <h4>Reservation of Rights</h4>
          <p>
            We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.<br><br>
          </p>


          <h4>Removal of links from our website</h4>
          <p>
            If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.<br><br>
            We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.<br><br>
          </p>


          <h4>Disclaimer</h4>
          <p>
            To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:<br><br>
          <ul style="padding-left:10px;">
            <li>limit or exclude our or your liability for death or personal injury;</li>
            <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
            <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
            <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
          </ul>
          The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.<br><br>
          As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Privacy Policy -->
  <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle">Privacy Policy</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <h4>Your Privacy</h4>
          <p>
          <h6><i><b>Privacy Policy for only goods</b></i></h6>
          At only goods, accessible from www.onlygoods.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by only goods and how we use it.<br><br>
          If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.<br><br>
          This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in only goods. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the Free Privacy Policy Generator.<br><br>

          <h6><i><b>Consent</b></i></h6>
          By using our website, you hereby consent to our Privacy Policy and agree to its terms.<br><br>

          <h6><i><b>Information we collect</b></i></h6>
          The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.<br><br>
          If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.<br><br>
          When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.<br><br>

          <h6><i><b>How we use your information</b></i></h6>
          We use the information we collect in various ways, including to:<br><br>
          <ul style="padding-left:10px;">
            <li>Provide, operate, and maintain our website</li>
            <li>Improve, personalize, and expand our website</li>
            <li>Understand and analyze how you use our website</li>
            <li>Develop new products, services, features, and functionality</li>
            <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
            <li>Send you emails</li>
            <li>Find and prevent fraud</li>
          </ul>


          <h6><i><b>Log Files</b></i></h6>
          only goods follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.<br><br>

          <h6><i><b>Cookies and Web Beacons</b></i></h6>
          Like any other website, only goods uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.<br><br>
          For more general information on cookies, please read the Cookies article on Generate Privacy Policy website.<br><br>

          <h6><i><b>Advertising Partners Privacy Policies</b></i></h6>
          You may consult this list to find the Privacy Policy for each of the advertising partners of only goods.<br><br>
          Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on only goods, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.<br><br>
          Note that only goods has no access to or control over these cookies that are used by third-party advertisers.<br><br>

          <h6><i><b>Third Party Privacy Policies</b></i></h6>
          only goods's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.<br><br>
          You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites.<br><br>

          <h6><i><b>CCPA Privacy Rights (Do Not Sell My Personal Information)</b></i></h6>
          Under the CCPA, among other rights, California consumers have the right to:<br><br>
          Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.<br><br>
          Request that a business delete any personal data about the consumer that a business has collected.<br><br>
          Request that a business that sells a consumer's personal data, not sell the consumer's personal data.<br><br>
          If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<br><br>

          <h6><i><b>GDPR Data Protection Rights</b></i></h6>
          We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:<br><br>
          The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.<br><br>
          The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.<br><br>
          The right to erasure – You have the right to request that we erase your personal data, under certain conditions.<br><br>
          The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.<br><br>
          The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.<br><br>
          The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.<br><br>
          If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.<br><br>

          <h6><i><b>Children's Information</b></i></h6>
          Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.<br><br>
          only goods does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.<br><br>
          </p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#myModal').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  </script>

</body>

</html>