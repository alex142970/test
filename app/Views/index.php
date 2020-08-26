<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script type="text/javascript" src="https://vk.com/js/api/share.js?95" charset="windows-1251"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v8.0" nonce="nlHxOUrl"></script>
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/logo.png" alt="Logo" width="32px" class="mr-2">
            Рога и Копыта
        </a>
    </div>
</nav>

<article>
    <div class="container mt-4">

        <h1>Lorem ipsum dolor</h1>

        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta non obcaecati quia recusandae. Blanditiis dolorum illo iste! Adipisci aut dolor omnis provident sunt. Amet, dignissimos exercitationem laborum perferendis quam quia?
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta non obcaecati quia recusandae. Blanditiis dolorum illo iste! Adipisci aut dolor omnis provident sunt. Amet, dignissimos exercitationem laborum perferendis quam quia?
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta non obcaecati quia recusandae. Blanditiis dolorum illo iste! Adipisci aut dolor omnis provident sunt. Amet, dignissimos exercitationem laborum perferendis quam quia?
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta non obcaecati quia recusandae. Blanditiis dolorum illo iste! Adipisci aut dolor omnis provident sunt. Amet, dignissimos exercitationem laborum perferendis quam quia?
    </div>
</article>
<section class="comments mt-4">
    <div class="container">
        <h3>Комментарии:</h3>
        <div id="comments">

           <?php  foreach ($comments as $comment) : ?>

               <div class="card mb-4">
                   <div class="card-body">
                       <h5 class="card-title"><?= $comment['title']?></h5>
                       <?= $comment['text']?>
                   </div>
                   <div class="card-footer text-muted">
                       Оставлен в <?= $comment['created_at']?>, пользователем <?= $comment['name']?> (<?= $comment['email']?>)
                   </div>
               </div>

            <?php endforeach; ?>
        </div>

        <h3>Оставить комментарий</h3>

        <form id="form" action="" class="form mt-4">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Ваше имя</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Заголовок</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Текст</label>
                <div class="col-sm-10">
                    <textarea name="text" id="text" rows="5" class="form-control" required></textarea>
                </div>
            </div>

            <button class="btn btn-primary" id="send">Отправить</button>
        </form>
    </div>
</section>
<footer class="footer bg-dark mt-4">
    <div class="container p-4 d-flex align-items-end">
        <script type="text/javascript">document.write(VK.Share.button(false,{type: "round", text: "Сохранить"}));</script>
        <div class="fb-share-button ml-2" data-href="" data-layout="button_count" data-size="small">
            <a target="_blank" href="" class="fb-xfbml-parse-ignore">Поделиться</a>
        </div>
    </div>
</footer>
<script src="/assets/app.js"></script>
</body>
</html>