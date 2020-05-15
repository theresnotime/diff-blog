<?php
/**
 * @package PublishPress
 * @author  PublishPress
 *
 * Copyright (c) 2018 PublishPress
 *
 * This file is part of PublishPress
 *
 * PublishPress is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PublishPress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PublishPress.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace PublishPress\AsyncNotifications;

/**
 * Interface QueueInterface
 *
 * @package PublishPress\NotificationsLog
 */
interface QueueInterface
{
    /**
     * Enqueue the notification for async processing.
     *
     * @param $workflowPost
     * @param $actionArgs
     * @param $receivers
     * @param $content
     * @param $channel
     *
     * @throws \Exception
     */
    public function enqueueNotification($workflowPost, $actionArgs, $receivers, $content, $channel);
}
