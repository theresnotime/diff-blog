<?php # -*- coding: utf-8 -*-
/*
 * This file is part of the MultilingualPress package.
 *
 * (c) Inpsyde GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Inpsyde\MultilingualPress\Module\Redirect\Settings;

/**
 * Class SettingsRepository
 * @package Inpsyde\MultilingualPress\Module\Redirect
 */
class Repository
{
    const META_KEY_USER = 'multilingualpress_redirect';
    const OPTION_SITE = 'multilingualpress_module_redirect';

    const MODULE_SETTINGS = 'multilingualpress_module_redirect_settings';
    const MODULE_SETTING_FALLBACK_REDIRECT_SITE_ID = 'fallback_site_id';

    /**
     * Is the Redirect enabled for the given site?
     *
     * @param int $siteId
     * @return bool
     */
    public function isRedirectEnabledForSite(int $siteId = 0): bool
    {
        return (bool)get_blog_option(
            $siteId ?: get_current_blog_id(),
            self::OPTION_SITE
        );
    }

    /**
     * Is the Redirect enabled for the given user?
     *
     * @param int $userId
     * @return bool
     */
    public function isRedirectEnabledForUser(int $userId = 0): bool
    {
        return (bool)get_user_meta(
            $userId ?: get_current_user_id(),
            self::META_KEY_USER
        );
    }

    /**
     * Retrieve the redirect site id for fallback
     *
     * @return int
     */
    public function redirectFallbackSiteId(): int
    {
        $options = $this->moduleSettings();

        return (int)($options[self::MODULE_SETTING_FALLBACK_REDIRECT_SITE_ID] ?? 0);
    }

    /**
     * Update Redirect Fallback Site Id
     *
     * @param int $siteId
     * @return void
     */
    public function updateRedirectFallbackSiteId(int $siteId)
    {
        $options = $this->moduleSettings();

        $options[self::MODULE_SETTING_FALLBACK_REDIRECT_SITE_ID] = $siteId;

        $this->updateModuleSettings($options);
    }

    /**
     * Retrieve the Module Settings
     *
     * @return array
     */
    protected function moduleSettings(): array
    {
        return (array)get_network_option(null, self::MODULE_SETTINGS, []) ?: [];
    }

    /**
     * Update the Given Module Settings
     *
     * @param array $options
     * @return void
     */
    protected function updateModuleSettings(array $options)
    {
        update_network_option(null, self::MODULE_SETTINGS, $options);
    }
}
