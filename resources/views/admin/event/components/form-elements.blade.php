<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.event.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.event.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('price'), 'has-success': fields.price && fields.price.valid }">
    <label for="price" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.event.columns.price') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.price" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('price'), 'form-control-success': fields.price && fields.price.valid}" id="price" name="price" placeholder="{{ trans('admin.event.columns.price') }}">
        <div v-if="errors.has('price')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('price') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('category'), 'has-success': fields.category && fields.category.valid }">
    <label for="category" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.event.columns.category') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.category" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('category'), 'form-control-success': fields.category && fields.category.valid}" id="category" name="category" placeholder="{{ trans('admin.event.columns.category') }}">
        <div v-if="errors.has('category')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('category') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('total_seats'), 'has-success': fields.total_seats && fields.total_seats.valid }">
    <label for="total_seats" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.event.columns.total_seats') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.total_seats" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('total_seats'), 'form-control-success': fields.total_seats && fields.total_seats.valid}" id="total_seats" name="total_seats" placeholder="{{ trans('admin.event.columns.total_seats') }}">
        <div v-if="errors.has('total_seats')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('total_seats') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_time'), 'has-success': fields.start_time && fields.start_time.valid }">
    <label for="start_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.event.columns.start_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_time" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start_time'), 'form-control-success': fields.start_time && fields.start_time.valid}" id="start_time" name="start_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_time') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_time'), 'has-success': fields.end_time && fields.end_time.valid }">
    <label for="end_time" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.event.columns.end_time') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_time" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('end_time'), 'form-control-success': fields.end_time && fields.end_time.valid}" id="end_time" name="end_time" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('end_time')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_time') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_custom_seat'), 'has-success': fields.is_custom_seat && fields.is_custom_seat.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_custom_seat" type="checkbox" v-model="form.is_custom_seat" v-validate="''" data-vv-name="is_custom_seat"  name="is_custom_seat_fake_element">
        <label class="form-check-label" for="is_custom_seat">
            {{ trans('admin.event.columns.is_custom_seat') }}
        </label>
        <input type="hidden" name="is_custom_seat" :value="form.is_custom_seat">
        <div v-if="errors.has('is_custom_seat')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_custom_seat') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('custom_seats'), 'has-success': fields.custom_seats && fields.custom_seats.valid }" v-if="form.is_custom_seat">
    <label for="custom_seats" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.event.columns.custom_seats') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="card p-1 row">
            <div class="col-md-12 d-flex align-items-center" v-for="(seat,index) in form.custom_seats">
                <input type="text" class="form-control" placeholder="Seat Name" v-model="form.custom_seats[index].name">
                &nbsp; &nbsp;
                <input type="checkbox" id="exampleCheck1" class="form-check-input" v-model="form.custom_seats[index].occupied">
                <label class="form-check-label" for="exampleCheck1">Occupied</label>
                &nbsp; &nbsp;
                <button class="btn btn-sm btn-success" @click.prevent="addSeat">+</button>
                &nbsp;
                <button class="btn btn-sm btn-danger" @click.prevent="removeSeat(index)">-</button>
            </div>
        </div>
        <div v-if="errors.has('custom_seats')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('custom_seats') }}</div>
    </div>
</div>


