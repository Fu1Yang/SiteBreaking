<?php
declare(strict_types=1);
namespace app\SiteBreaking\router;
class NotAllowedException extends  \Exception
{
    public function __construct($message = "Vous n'avez pas les droits administrateurs")
        {
            parent::__construct($message, 403);
        }
}
