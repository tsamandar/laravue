<template>
  <DayPilotScheduler id="dp" ref="scheduler" :config="config" />
</template>

<script>
import { DayPilot, DayPilotScheduler } from 'daypilot-pro-vue';
// import ReservationResource from '@/api/reservation';

// const reservationResource = new Resource('reservation');
import Vue from 'vue';

import { fetchReservations } from '@/api/reservation';

export default {
  name: 'Scheduler',
  components: {
    DayPilotScheduler,
  },
  props: {},
  data: function() {
    return {
      config: {
        timeHeaders: [
          { groupBy: 'Year' },
          { groupBy: 'Month' },
          { groupBy: 'Day', format: 'd' },
        ],
        scale: 'Day',
        days: DayPilot.Date.today().daysInYear(),
        startDate: DayPilot.Date.today().firstDayOfYear(),
        businessWeekends: true,
        timeRangeSelectedHandling: 'Enabled',
        onTimeRangeSelected: async(args) => {
          const dp = args.control;
          const modal = await DayPilot.Modal.prompt(
            'Create a new event:',
            'Event 1'
          );
          dp.clearSelection();
          if (modal.canceled) {
            return;
          }
          dp.events.add({
            start: args.start,
            end: args.end,
            id: DayPilot.guid(),
            resource: args.resource,
            text: modal.result,
          });
        },
        eventMoveHandling: 'Update',
        onEventMoved: (args) => {
          args.control.message('Event moved: ' + args.e.text());
        },
        eventResizeHandling: 'Update',
        onEventResized: (args) => {
          args.control.message('Event resized: ' + args.e.text());
        },
        eventDeleteHandling: 'Update',
        onEventDeleted: (args) => {
          args.control.message('Event deleted: ' + args.e.text());
        },
        eventClickHandling: 'Disabled',
        eventHoverHandling: 'Bubble',
        bubble: new DayPilot.Bubble({
          onLoad: (args) => {
            // if event object doesn't specify "bubbleHtml" property
            // this onLoad handler will be called to provide the bubble HTML
            args.html = 'Event details';
          },
        }),
      },
    };
  },
  computed: {
    // DayPilot.Scheduler object - https://api.daypilot.org/daypilot-scheduler-class/
    scheduler: function() {
      return this.$refs.scheduler.control;
    },
  },
  mounted: function() {
    this.loadResources();
    this.loadEvents();

    // this.scheduler.message('Welcome!');
  },
  methods: {
    async loadEvents() {
      const { data } = await fetchReservations(74);

      const events = [];

      const resources = [];

      data.rooms.map((item) => {
        resources.push({
          name: `${item.title} ${item.type}`,
          id: item.id,
        });
      });

      data.items.map((item) => {
        events.push({
          id: item.id,
          start: item.start_date,
          end: item.end_date,
          text: item.id,
          resource: Number(item.rooms),
        });
      });

      // const events = [
      //   // { id: 1, start: "2018-10-01T00:00:00", end: "2018-10-05T00:00:00", text: "Event 1", resource: "R1" },
      //   {
      //     id: 2,
      //     start: DayPilot.Date.today().addDays(2),
      //     end: DayPilot.Date.today().addDays(5),
      //     text: 'Event 1',
      //     resource: 'R2',
      //   },
      // ];
      Vue.set(this.config, 'events', events);
      Vue.set(this.config, 'resources', resources);
    },
  },
};
</script>
