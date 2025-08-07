export type RoleType = 'visitor' | 'promoter' | 'agency' | 'admin';
export type Lang = 'fr' | 'mg';
export type AccountStatus = 'active' | 'inactive' | 'suspended';
export type CategoryLocation = 'sell' | 'location';
export type TypeField = 'buildable' | 'agricultural' | 'industrial';
export type Region = 'Analamanga' | 'Bongolava' | 'Itasy' | 'Vakinankaratra' | 'Diana' | 'Sava' |
                    'Amoroni Mania' | 'Atsimo-Atsinanana' | 'Fitovinany' | 'Haute Matsiatra' |
                    'Ihorombe' | 'Vatovavy' | 'Betsiboka' | 'Boeny' | 'Melaky' | 'Sofia' |
                    'Alaotra-Mangoro' | 'Ambatosoa' | 'Analanjirofo' | 'Atsinanana' | 'Androy' |
                    'Anosy' | 'Atsimo-Andrefana' | 'Menabe';
export type EstateStatus = 'available' | 'reserved' | 'sold' | 'rent' | 'removed';

export interface User {
    id: number,
    email: string,
    verified_at?: string,
    role: RoleType,
    contact: string,
    avatar_path?: string,
    last_login_at?: string,
    created_at?: string,
    updated_at?: string,
    deleted_at?: string,
}

export interface Visitor {
    id: number,
    user_id: number,
    status: AccountStatus,
    created_at?: string,
    updated_at?: string,
}

export interface Promoter {
    id: number,
    user_id: number,
    facebook_link?: string,
    status: AccountStatus,
    created_at?: string,
    updated_at?: string,
}

export interface Agency {
    id: number,
    user_id: number,
    company_name: string,
    nif: string,
    stat: string,
    responsible_name: string,
    facebook_link?: string,
    website_url?: string,
    created_at?: string,
    updated_at?: string,
}

export interface InformationDetail {
    id: number,
    profilable_type: string,
    profilable_id: number,
    lastname: string,
    firstname: string
    birth_date: string,
    is_male: boolean,
    created_at: string,
    updated_at: string,
    lang: Lang,
}

export interface City {
    id: number,
    name: string,
    region: Region,
}

export interface Field {
    id: number,
    type: TypeField,
    is_fenced: boolean,
    road_access: boolean,
    created_at?: string,
    updated_at?: string,
}

export interface Estate {
    id: number,
    title: string,
    description: string,
    category: CategoryLocation,
    field?: Field,
    sell_price?: string,
    rent_price?: string,
    area: number,
    longitude: number,
    latitude: number,
    address: string,
    city: City,
    promoter: Promoter,
    agency?: Agency,
    visitor?: Visitor,
    is_validated: boolean,
    status: EstateStatus,
    cover_image?: string,
    water: boolean,
    eletricity: boolean,
    views_count: number,
    created_at?: string,
    updated_at?: string,
    deleted_at?: string,
}

export interface RegisterData  {
    email: string,
    password: string,
    contact: string,
    company_name: string,
    nif: string,
    stat: string,
    responsible_name: string,
    lang: Lang,
}
