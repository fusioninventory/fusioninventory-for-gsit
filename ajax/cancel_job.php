<?php

/*
   ------------------------------------------------------------------------
   FusionInventory
   Copyright (C) 2010-2023 by the FusionInventory Development Team.

   http://www.fusioninventory.org/   http://forge.fusioninventory.org/
   ------------------------------------------------------------------------

   LICENSE

   This file is part of FusionInventory project.

   FusionInventory is free software: you can redistribute it and/or modify
   it under the terms of the GNU Affero General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   FusionInventory is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
   GNU Affero General Public License for more details.

   You should have received a copy of the GNU Affero General Public License
   along with FusionInventory. If not, see <http://www.gnu.org/licenses/>.

   ------------------------------------------------------------------------

   @package   FusionInventory
   @author    Walid Nouh
   @co-author
   @copyright Copyright (c) 2010-2023 FusionInventory team
   @license   AGPL License 3.0 or (at your option) any later version
              http://www.gnu.org/licenses/agpl-3.0-standalone.html
   @link      http://www.fusioninventory.org/
   @link      https://github.com/fusioninventory/fusioninventory-for-gsit
   @since     2010

   ------------------------------------------------------------------------
 */

include ("../../../inc/includes.php");
Session::checkCentralAccess();

header("Content-Type: text/json; charset=UTF-8");
Html::header_nocache();

if (isset($_REQUEST['jobstate_id'])) {
   $jobstate = new PluginFusioninventoryTaskjobstate();
   $jobstate->getFromDB($_REQUEST['jobstate_id']);

   $job = new PluginFusioninventoryTaskjob();
   $job->delete(['id' => $jobstate->fields['plugin_fusioninventory_taskjobs_id']], true);
}
