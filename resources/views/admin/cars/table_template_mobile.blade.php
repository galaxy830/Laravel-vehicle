<div class="section-top-side box-bg-mobile2">
	<div class="section-block--title">Марка</div>
	<div class="filter-side--right">
		<div class="section-top-added gogocar-arrow-button">
			<a href="{{ route('admin.car.create', app()->getLocale()) }}" class="" title="Create New Car">
				<svg class="icon icon-plus ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#plus')}}"></use>
				</svg>
			</a>
		</div>
	</div>
</div>
<div class="section-bottom-side--mobile__list">
	<!-- Элемент мобильной таблицы-->
	@if(count($cars) == 0)
	<h4>@lang('global.no_data').</h4>
	@else
	@foreach($cars as $car)
	<div class="section-bottom-side--mobile__item--wrap section-data-container--item">
		<div class="section-bottom-side--mobile__item">
			<div class="section-bottom-side--mobile__item--name">{{ $car->model }}</div>
			<div class="section-bottom-side--mobile__item--attr">
				<div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
					<svg class="icon icon-dots ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
					</svg>
					<div class="section-tbody--modal--table__mobile">
						<a href="{{ route('admin.car.show', ['locale' => app()->getLocale(), 'id' => $car->id]) }}"
							class="links" title="Show listing">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-car2 ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#car2')}}"></use>
								</svg><span>@lang('global.app_view')</span>
							</div>
						</a>
						<a href="{{ route('admin.car.edit', ['locale' => app()->getLocale(), 'id' => $car->id]) }}"
							class="links" title="Edit car">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-pen ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
								</svg><span>@lang('global.app_edit')</span>
							</div>
						</a>
						<form method="POST"
							action="{!! route('admin.car.destroy', ['locale' => app()->getLocale(), 'id' => $car->id]) !!}"
							accept-charset="UTF-8">
							<input name="_method" value="DELETE" type="hidden">
							{{ csrf_field() }}
							<div class="section-tbody--modal--item">
								<svg class="icon icon-delete-red ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
									</use>
								</svg><span>@lang('global.app_delete')</span>
							</div>
						</form>
					</div>
				</div>
				<div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
					<svg class="icon icon-arrow-down-mobile ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile')}}"></use>
					</svg>
				</div>
			</div>
		</div>
		<ul class="section-bottom-side--mobile__item--content">
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">ID:</div>
				<div class="section-mobile-table--item__right">{{ $loop->index + 1 }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.car.fields.owner'):</div>
				<div class="section-mobile-table--item__right">{{ optional($car->carUser)->name }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.car.fields.model'):</div>
				<div class="section-mobile-table--item__right">{{ $car->model }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.car.fields.brand'):</div>
				<div class="section-mobile-table--item__right">{{ $car->name }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.car.fields.color'):</div>
				<div class="section-mobile-table--item__right">{{ $car->color }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.car.fields.year'):</div>
				<div class="section-mobile-table--item__right">{{ $car->year }}</div>
			</li>
			{{-- <li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">Type:</div>
				<div class="section-mobile-table--item__right">{{ $car->type }}</div>
			</li> --}}
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.car.fields.number'):</div>
				<div class="section-mobile-table--item__right">{{ $car->number }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.car.fields.body_type'):</div>
				<div class="section-mobile-table--item__right">{{ $car->body_type }}</div>
			</li>
		</ul>
	</div>
	@endforeach
	@endif
</div>
<div class="section-bottom-pagination--wrap mt-20px">
	<!--.section-bottom--delete.gogocar-arrow-button-->
	<!--    +icon('delete')-->
	<div class="section-bottom-pagination"></div>
</div>