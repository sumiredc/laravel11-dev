.PHONY: pint
pint:
	@./vendor/bin/pint -v

.PHONY: ide-helper
ide-helper:
	@php artisan ide-helper:generate
	@php artisan ide-helper:meta
	@php artisan ide-helper:models -N -R
