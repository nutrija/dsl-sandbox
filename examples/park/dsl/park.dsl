module Park
{
    root Vehicle
    {
        string model;
        int year;
        Engine *engine;
        CurrentState? state;
        Company? *company;

        specification isMuscleCar 'it => it.engine.power > 250 && it.year < 1970';
        calculated muscleCar from isMuscleCar;

        calculated isOldtimer from 'it => it.year < 1950';

        persistence;

        specification hasValidModelLength
                'it => it.model.Length > 2';

        validation ValidVehicle
        {
            specification hasValidYear
                'it => it.year>1900 && it.year<2013'
                'it => "You must enter a valid year"';
            specification hasValidModelLength
                'it => "Model name too short"';
            check;
        }
    }

    root Company
    {
        string name;
    }

    entity Engine (serialNumber)
    {
        string serialNumber;
        int power;
    }

    value CurrentState
    {
        float litersInTank;
        int mileage;
        int oilChangeIn;
    }
}