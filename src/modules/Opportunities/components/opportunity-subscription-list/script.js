app.component('opportunity-subscription-list' , {
    template: $TEMPLATES['opportunity-subscription-list'],

    setup() {
        $MAPAS.config.opportunitySubscriptionList.registrations = $MAPAS.config.opportunitySubscriptionList.registrations.map((registration) => {
            if (registration instanceof Entity) {
                return registration;
            } else {
                const entity = new Entity('registration', registration.id);
                entity.populate(registration);
                return entity;
            }             
        });
    },

    data() {
        const registrations = $MAPAS.config.opportunitySubscriptionList.registrations;
        return {
            registrations,
            opportunity: $MAPAS.requestedEntity,
        }
    },

    computed: {
        registrationStatus() {
            let _actualDate = new Date();
            let _fromDate = new McDate(this.opportunity.registrationFrom?.date)._date;
            let _toDate = new McDate(this.opportunity.registrationTo?.date)._date;

            if (_fromDate < _actualDate && _toDate > _actualDate) {
                return 'open';
            }

            if (_toDate < _actualDate) {
                return 'closed';
            }

            return false;
        },
        registrationsOpen() {
            for (const registration of this.registrations) {
                if (registration.status == 0) {
                    return true;
                }
            }
            return false;
        }
    }
});