<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../../content/css/lienhe.css">
    <title>Contact</title>
</head>

<body>
    <div class="contact-container">
        <div class="contact-wrap">
            <div class="map-wrap">
              

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122684.11218500606!2d107.99555423404558!3d16.071793221775142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0x1df0cb4b86727e06!2zxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1689336770736!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="form">
                <h3 class="title">Send us your message</h3>
                <form action="" name="submit-to-google-sheet">
                    <input type="text" name="Name" placeholder="Full Name" />
                    <input type="tel" name="Phone" placeholder="Phone Number" />
                    <input type="email" name="Email" placeholder="Email Address" />
                    <textarea name="Message" id="" rows="6" placeholder="Message"></textarea>
                    <input type="submit" value="Send" class="button">
                </form>
            </div>
        </div>
    </div>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbzTCDloueq0Pd3ZxtDmkvyLncdTkIkjpbyy8bfDaig/dev'
        const form = document.forms['submit-to-google-sheet']

        form.addEventListener('submit', e => {
            // e.preventDefault()
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => console.log('Success!', response))
                .catch(error => console.error('Error!', error.message))
        })
    </script>
</body> 

</html>