<?php
/**
 * ReportProblem Controller
 *
 * Handle requests coming from the "Report an issue on this page" component.
 *
 * @author    Francis Mawn
 * @package   CraftGCWebModule
 * @since     1.0.0
 */

namespace modules\craftgcweb\controllers;

use Craft;
use craft\web\Controller;
use yii\base\InvalidConfigException;

class ReportProblemController extends Controller
{
    // Protected Properties
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected $allowAnonymous = ['index'];

    // Public Methods
    // =========================================================================

    public function actionIndex()
    {
        // Ensure request is an ajax post.
        $this->requirePostRequest();
        $this->requireAcceptsJson();
        $request = Craft::$app->getRequest();

        // Get recipient email from environment variable
        if (!$recipient = getenv('EMAIL_REPORT_PROBLEM') ?? null) {
            throw new InvalidConfigException('Email recipient was not configured to get the "Report Problem" notification.');
        }

        // Render email body via the template file
        $emailBody = Craft::$app->getView()->renderTemplate('_emails/reportProblem', [
            'formData'        => $request->post(),
            'clientOs'        => $request->getClientOs(),
            'userAgent'       => $request->getUserAgent(),
            'userIP'          => $request->getUserIP(),
            'isMobileBrowser' => $request->isMobileBrowser() ? 'Yes' : 'No',
        ]);

        // Send the email notification
        $success = Craft::$app
            ->getMailer()
            ->compose()
            ->setTo($recipient)
            ->setSubject('A problem was reported')
            ->setHtmlBody($emailBody)
            ->send();

        return $this->asJson(compact('success'));
    }
}
