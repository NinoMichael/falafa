export type RoleType = 'visitor' | 'promoter' | 'agency' | 'admin';
export type Lang = 'fr' | 'mg';
export type AccountStatus = 'active' | 'inactive' | 'suspended';

export interface User {
    id: number,
    email: string,
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
    verified_at?: string,
    status: AccountStatus,
    created_at?: string,
    updated_at?: string,
}

export interface Promoter {
    id: number,
    user_id: number,
    facebook_link?: string,
    verified_at?: string,
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
