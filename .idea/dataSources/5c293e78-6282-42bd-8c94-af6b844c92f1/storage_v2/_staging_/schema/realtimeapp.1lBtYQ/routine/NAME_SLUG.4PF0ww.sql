create
	definer = admin@`%` function NAME_SLUG(name varchar(255)) returns varchar(255)
BEGIN
            RETURN LOWER(REPLACE(name, ' ', '-'));
        END;
