export type RoleType = 'visitor' | 'promoter' | 'agency' | 'admin';

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