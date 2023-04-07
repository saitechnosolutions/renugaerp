<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;


class MailController extends Controller
{
    //

    public function sendMail(Request $request)
    {

        $tomail = $request->tomail;
        $subject = $request->subject;
        $attachmentfile = $request->attachmentfile;
        $message = $request->message;
        $leadid = $request->leadid;
                        $description = "
                        <html>

                        <body>
                        <p><b>Greetings for the day, </b></p>
                        <p>$message</p>
                        </body>
                        </html>
                        ";


        require base_path("vendor/autoload.php");
                    $mail = new PHPMailer(true);     // Passing `true` enables exceptions

                    try {

                    // Email server settings
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';             //  smtp host
                    $mail->SMTPAuth = true;
                    $mail->Username = 'saitechnosolutionscbe@gmail.com';
                    $mail->Password = 'lwysjixcfqanrtgr';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('sales@renugaaircompressor.com', 'Sree Renuga Air Compressor');
                    $mail->addAddress($tomail);
                    // $mail->addCC($request->emailCc);
                    // $mail->addBCC($request->emailBcc);

                    // $mail->addReplyTo('sender@example.com', 'SenderReplyName');

                    // if(isset($_FILES['emailAttachments'])) {
                    //     for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                            $mail->addAttachment(public_path('proposal/'.$attachmentfile));
                    //     }
                    // }


                    $mail->isHTML(true);                // Set email content format to HTML

                    $mail->Subject = $subject;
                    $mail->Body    = $description;

                    // $mail->AltBody = plain text version of email body;

                    if( $mail->send() ) {

                        $update = DB::table('leadmails')
                        ->insert([
                            "tomail"=>$tomail,
                            "subject"=>$subject,
                            "message"=>$message,
                            "attachment"=>$attachmentfile,
                            "leadid"=>$leadid
                        ]);
                    }

                    } catch (Exception $e) {
                        return back()->with('success','Message could not be sent.');
                    }
        // return redirect()->back()->with('success', 'Mail sent successfully.');
    }
}
