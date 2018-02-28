<?php
/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Andre Flemming <andre(at)scoutnet.de>, ScoutNet
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  open source software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace DasLampe\AfContactform\Controller;


use DasLampe\AfContactform\Domain\Model\FormValue;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class FrontendController extends ActionController
{
    /**
     * @var \TYPO3\CMS\Core\Mail\MailMessage
     * @inject
     */
    protected $mailMessage;

    public function indexAction() {
        $value = new FormValue();
        $this->view->assign("formValue", $value);
        //Only Template
    }

    public function sendMailAction(FormValue $formValue) {
        $settings = $GLOBALS['TSFE']->config['config']['tx_afcontactform.'];
        $from = $settings['from'];
        $to = $settings['to'];

        $bodyMessage = sprintf("Guten Tag,
es wurde eine Anfrage über das Kontaktformular gestellt. Folgende Daten wurden übermittelt

Name: %s
Telefonnummer: %s
Emailadresse: %s
Nachricht:
%s",
            $formValue->getFullname(),
            $formValue->getPhone(),
            $formValue->getEmail(),
            $formValue->getMessage());

        if(!empty($formValue->getEmail())) {
            $bodyMessage = $bodyMessage . sprintf("
            
Sie können direkt auf diese Email antworten.");
            $this->mailMessage->setReplyTo(array($formValue->getEmail() => $formValue->getFullname()));
        }

        $this->mailMessage
            ->setFrom(array($from => $settings['fromName']))
            ->setTo(array($to))
            ->setSubject("Anfrage über das Kontaktformular")
            ->setBody($bodyMessage)
            ->send();
    }
}