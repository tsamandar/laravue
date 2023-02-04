<template>
  <div class="app-container">
    <div class="filter-container">
      <el-button class="filter-item" type="primary" icon="el-icon-plus" @click="handleCreateForm">
        {{ $t('table.add') }}
      </el-button>
    </div>
    <el-table v-loading="loading" :data="list" border fit highlight-current-row>
      <el-table-column align="center" label="ID" width="80">
        <template slot-scope="scope">
          <span>{{ scope.row.id }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Title">
        <template slot-scope="scope">
          <span>{{ scope.row.title }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Type">
        <template slot-scope="scope">
          <span>{{ scope.row.type }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Price">
        <template slot-scope="scope">
          <span>{{ scope.row.price }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Square">
        <template slot-scope="scope">
          <span>{{ scope.row.square }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Size">
        <template slot-scope="scope">
          <span>{{ scope.row.size }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Status">
        <template slot-scope="scope">
          <span>{{ scope.row.status }}</span>
        </template>
      </el-table-column>
      <el-table-column align="center" label="Actions" width="350">
        <template slot-scope="scope">
          <el-button type="success" size="small" @click="handleDelete(scope.row.id, scope.row.name);">
            View
          </el-button>

          <el-button type="primary" size="small" @click="handleDelete(scope.row.id, scope.row.name);">
            Update
          </el-button>

          <el-button type="danger" size="small" @click="handleDelete(scope.row.id, scope.row.name);">
            Delete
          </el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-dialog :title="'Create new room'" :visible.sync="roomFormVisible">
      <div class="form-container">
        <el-form ref="categoryForm" :model="currentRoom" label-width="70px" style="max-width: 400px; margin-left: 50px">
          <el-form-item label="Name" prop="name">
            <el-input v-model="currentRoom.name" />
          </el-form-item>

          <el-form-item :label="$t('room.type')" prop="type">
            <el-select v-model="currentRoom.type" class="filter-item" placeholder="Please select room type">
              <el-option v-for="item in roomTypes" :key="item" :label="item | uppercaseFirst" :value="item" />
            </el-select>
          </el-form-item>

          <el-form-item :label="$t('room.status')" prop="status">
            <el-select v-model="currentRoom.status" class="filter-item" placeholder="Please select status">
              <el-option v-for="item in status" :key="item" :label="item | uppercaseFirst" :value="item" />
            </el-select>
          </el-form-item>

          <el-form-item label="Price" prop="price">
            <el-input v-model="currentRoom.price" />
          </el-form-item>

          <el-form-item label="Quantity of person" prop="size">
            <el-input v-model="currentRoom.size" />
          </el-form-item>


          <el-form-item label="Square" prop="square">
            <el-input v-model="currentRoom.square" />
          </el-form-item>

          <el-form-item :label="$t('room.color')" prop="type">
            <el-select v-model="currentRoom.color" class="filter-item" placeholder="Please select color">
              <el-option v-for="item in color" :key="item" :label="item | uppercaseFirst" :value="item" />
            </el-select>
          </el-form-item>

        </el-form>
        <div slot="footer" class="dialog-footer">
          <el-button @click="roomFormVisible = false">
            Cancel
          </el-button>
          <el-button type="primary" @click="handleSubmit()">
            Confirm
          </el-button>
        </div>
      </div>
    </el-dialog>
  </div>
</template>

<script>
import Resource from '@/api/resource';
const resourceRoom = new Resource('rooms');

export default {
  name: 'RoomList',
  data() {
    return {
      list: [],
      loading: true,
      roomFormVisible: false,
      currentRoom: {},
      roomTypes: ['single', 'double', 'triple', 'family', 'deluxe'],
      color: ['red', 'green', 'yellow', 'blue', 'gold'],
      status: ['keeping', 'repair', 'active'],
    };
  },

  created() {
    this.getList();
  },

  methods: {
    async getList() {
      this.loading = true;
      const { data } = await resourceRoom.list({});
      this.list = data;
      this.loading = false;
    },
    handleSubmit() {
    },
    handleCreateForm() {
      this.roomFormVisible = true;
      this.currentRoom = {
        name: '',
        type: '',
        color: '',
        price: '',
        size: '',
        sqaure: '',
        status: '',
      };
    },
  },
};
</script>
