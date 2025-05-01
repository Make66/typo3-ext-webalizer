<?php

declare(strict_types=1);

namespace Taketool\Webalizer\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Attribute\AsController;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;

#[AsController]
class ViewController extends ActionController
{
    private $extKey = 'webalizer';
    private ExtensionConfiguration $extensionConfiguration;
    private ModuleTemplateFactory $moduleTemplateFactory;
    private IconFactory $iconFactory;
    protected UriBuilder $uriBuilder;

    public function __construct(
        ExtensionConfiguration $extensionConfiguration,
        ModuleTemplateFactory  $moduleTemplateFactory,
        IconFactory            $iconFactory,
        UriBuilder             $uriBuilder
    )
    {
        $this->extensionConfiguration = $extensionConfiguration;
        $this->uriBuilder = $uriBuilder;
        $this->iconFactory = $iconFactory;
        $this->moduleTemplateFactory = $moduleTemplateFactory;
    }

    public function indexAction(): ResponseInterface
    {
        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);

        $webPath = $this->extensionConfiguration
            ->get($this->extKey, 'webPath');

        $moduleTemplate->assign('webPath', $webPath);

        // adding a page-shortcut button
        $routeIdentifier = 'system_webalizer'; // array-key of the module-configuration
        $buttonBar = $moduleTemplate->getDocHeaderComponent()->getButtonBar();
        $shortcutButton = $buttonBar->makeShortcutButton()
            ->setDisplayName('Shortcut to my action')
            ->setRouteIdentifier($routeIdentifier);
        $shortcutButton->setArguments(['controller' => 'ViewController', 'action' => 'index']);
        $buttonBar->addButton($shortcutButton, ButtonBar::BUTTON_POSITION_RIGHT);

        return $moduleTemplate->renderResponse('View/Index');
    }
}
