<?php

declare(strict_types=1);

namespace Setono\SyliusMailChimpPlugin\Context;

use Sylius\Component\Locale\Context\LocaleContextInterface as BaseLocaleContextInterface;
use Sylius\Component\Locale\Model\LocaleInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class LocaleContext implements LocaleContextInterface
{
    /** @var RepositoryInterface */
    private $localeRepository;

    /** @var BaseLocaleContextInterface */
    private $baseLocaleContext;

    public function __construct(RepositoryInterface $localeRepository, BaseLocaleContextInterface $baseLocaleContext)
    {
        $this->localeRepository = $localeRepository;
        $this->baseLocaleContext = $baseLocaleContext;
    }

    public function getLocale(): ?LocaleInterface
    {
        /** @var LocaleInterface $locale */
        $locale = $this->localeRepository->findOneBy(['code' => $this->baseLocaleContext->getLocaleCode()]);

        return $locale;
    }
}