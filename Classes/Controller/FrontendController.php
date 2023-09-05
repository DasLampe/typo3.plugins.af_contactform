<?php

namespace DasLampe\AfContactform\Controller;

use DasLampe\AfContactform\Domain\Model\FormValue;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Mime\Address;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class FrontendController extends ActionController
{
    /**
     * @var MailMessage
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected MailMessage $mailMessage;

    /**
     * @param MailMessage $mailMessage
     */
    public function injectMailMessage(MailMessage $mailMessage): void
    {
        $this->mailMessage = $mailMessage;
    }

    public function indexAction(): ResponseInterface
    {
        $value = new FormValue();
        $this->view->assign('formValue', $value);
        return $this->htmlResponse();
    }

    public function sendMailAction(FormValue $formValue): ResponseInterface
    {
        $from = $this->settings['from'];
        $to = $this->settings['to'];

        $bodyMessage = sprintf(
            "Guten Tag,
es wurde eine Anfrage über das Kontaktformular gestellt. Folgende Daten wurden übermittelt:\n\n

Name: %s \n
Telefonnummer: %s \n
Emailadresse: %s \n
Nachricht: \n
%s",
            $formValue->getFullname(),
            $formValue->getPhone(),
            $formValue->getEmail(),
            $formValue->getMessage()
        );

        if (!empty($formValue->getEmail())) {
            $bodyMessage = $bodyMessage . '
          
Sie können direkt auf diese Email antworten.';
            $this->mailMessage->setReplyTo([$formValue->getEmail() => $formValue->getFullname()]);
        }

        $this->mailMessage
            ->from(new Address($from, $this->settings['fromName']))
            ->to(new Address($to))
            ->subject('Anfrage über das Kontaktformular')
            ->text($bodyMessage)
            ->send();

        return $this->htmlResponse();
    }
}
