import type { Estate, CategoryLocation, TypeField, TypeHouse, Region, AccountStatus, EstateStatus, CategoryApartment } from '../types';
import propertyImg from '../../assets/images/example-property.jpg';

export const transformEstate = (item: any): Estate => {
    const typeData = item.field || item.house || item.apartment;

    return {
        id: item.id,
        title: item.title,
        description: item.description,
        category: item.category as CategoryLocation,
        field: item.type_type === 'fields' ? {
        id: typeData.id,
        type: typeData.type as TypeField,
        is_fenced: typeData.is_fenced,
        road_access: typeData.road_access,
        created_at: typeData.created_at,
        updated_at: typeData.updated_at,
    } : undefined,
    house: item.type_type === 'houses' ? {
        id: typeData.id,
        type: typeData.type as TypeHouse,
        rooms: typeData.rooms || 0,
        bathroom: typeData.bathroom || false,
        living_room: typeData.living_room || false,
        kitchen: typeData.kitchen || false,
        garden: typeData.garden || false,
        garage: typeData.garage || false,
        floor_count: typeData.floor_count || 0,
        is_furnished: typeData.furnished || false,
    } : undefined,
    apartment: item.type_type === 'apartments' ? {
        id: typeData.id,
        category: typeData.category as CategoryApartment,
        floor_number: typeData.floor_number || 0,
        building_name: typeData.building_name,
        rooms: typeData.rooms || 0,
        bathroom: typeData.bathroom || false,
        kitchen: typeData.kitchen || false,
        balcony: typeData.balcony || false,
        parking: typeData.parking || false,
        is_furnished: typeData.is_furnished || false,
    } : undefined,
        sell_price: item.sell_price,
        rent_price: item.rent_price,
        area: item.area,
        longitude: item.longitude,
        latitude: item.latitude,
        address: item.address,
        city: {
            id: item.city.id,
            name: item.city.name,
            region: item.city.province as Region,
        },
        promoter: {
            id: item.promoter.id,
            user_id: item.promoter.user_id,
            facebook_link: item.promoter.facebook_link,
            status: item.promoter.status as AccountStatus,
            created_at: item.promoter.created_at,
            updated_at: item.promoter.updated_at,
        },
        agency: undefined,
        visitor: undefined,
        is_validated: item.is_validated,
        status: item.status as EstateStatus,
        cover_image: item.cover_image || propertyImg,
        water: item.water,
        electricity: item.electricity,
        views_count: item.views_count,
        created_at: item.created_at,
        updated_at: item.updated_at,
        deleted_at: item.deleted_at,
    };
};

export const transformEstates = (data: any[]): Estate[] => data.map(transformEstate);