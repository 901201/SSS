<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);

    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'PHPMailer/language/');
    $mail->isHTML(true);
    // От кого
    $mail->setFrom('mail@strosist.ru', 'Сайт STROSIST.RU');
    // Кому
    $mail->addAddress('mail@strosist.ru');
    // Тема
    $mail->Subject = 'Заявка с сайта';
    // Тело письма
    $body = '';
    if (!empty($_POST['phone'])) {
        $body .= '<p>Телефон: ' .$_POST['phone']. '</p>';
    }

    $mail->Body = $body;
    if(!$mail->send()) {
        $message = 'Ошибка отправки сообщения';
    } else {
        $message = 'Данные отправлены';
    }

    $response = ['message' => $message];
    header('Content-type: application/json');
    echo json_encode($response);
?>