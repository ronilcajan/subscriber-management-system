<?php namespace Myth\Auth\Authentication\Activators;

use Config\Email;
use Config\Services;
use Myth\Auth\Entities\User;
use App\Models\SystemModel;
/**
 * Class EmailActivator
 *
 * Sends an activation email to user.
 *
 * @package Myth\Auth\Authentication\Activators
 */
class EmailActivator extends BaseActivator implements ActivatorInterface
{
    /**
     * Sends an activation email
     *
     * @param User $user
     *
     * @return bool
     */
    public function send(User $user = null): bool
    {
        $email = Services::email();
        $config = new Email();
        $sstem = new SystemModel();
		$ss = $sstem->find(1);
        $settings = $this->getActivatorSettings();

        $sent = $email->setFrom($settings->fromEmail ?? $ss['email'], $settings->fromName ?? $ss['name'])
              ->setTo($user->email)
              ->setSubject(lang('Auth.activationSubject'))
              ->setMessage(view($this->config->views['emailActivation'], ['hash' => $user->activate_hash]))
              ->setMailType('html')
              ->send();

        if (! $sent)
        {
            $this->error = lang('Auth.errorSendingActivation', [$user->email]);
            return false;
        }

        return true;
    }
}
